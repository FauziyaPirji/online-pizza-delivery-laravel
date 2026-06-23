<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $request->validate([
            'amount'     => 'required|numeric|min:0',
            'address1'   => 'required|string|max:100',
            'address2'   => 'nullable|string|max:100',
            'phone'      => 'required|string|max:15',
            'zipcode'    => 'required|digits:6',
        ]);

        DB::beginTransaction();


            // Combine addresses
            $fullAddress = trim($request->address . ', ' . $request->address1);

            $userId = Auth::id();
            // Insert order
            $order = Order::create([
                'userId'      => $userId,
                'address'     => $fullAddress,
                'zipCode'     => $request->zipcode,
                'phoneNo'     => $request->phone,
                'amount'      => $request->amount,
                'paymentMode' => '0', // Cash on delivery
                'orderStatus' => '0', // Order placed
                'OrderDate'   => now()
            ]);

            // Get cart items
            $cartItems = cart::where('userId', $userId)->get();

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'orderId'      => $order->orderId,        // Use the correct order ID
                    'pizzaId'      => $item->pizzaId,    // Get pizzaId from the cart item
                    'itemQuantity' => $item->itemQuantity
                ]);
            }

            // Clear the cart
            cart::where('userId', $userId)->delete();

            DB::commit();

            return redirect()->route('order.success')->with([
                'message' => "Thanks for ordering with us. Your order ID is {$order->id}.",
                'order_id' => $order->id
            ]);
    }
    public function userOrders()
    {
        $userId = Auth::id();
        $orders = Order::where('userId', $userId)->with('items.pizza')->get();
        
        return view('view_order', compact('orders'));
    }
    public function index() {
        $orders = Order::all();
        return view('admin.admin_order', compact('orders'));
    }    
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->orderStatus = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function updateDelivery(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->deliveryBoyName = $request->name;
        $order->deliveryBoyPhoneNo = $request->phone;
        $order->deliveryTime = $request->time;
        $order->save();

        return redirect()->back()->with('success', 'Delivery details updated successfully.');
    }
    public function report(Request $request)
    {
        $query = Order::with(['user', 'items.pizza.categories']);

        if ($request->filled('customer')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('m_name', 'like', '%' . $request->customer . '%');
            });
        }

        if ($request->filled('product')) {
            $query->whereHas('items.pizza', function($q) use ($request) {
                $q->where('pizzaName', 'like', '%' . $request->product . '%');
            });
        }

        if ($request->filled('category')) {
            $query->whereHas('items.pizza.categories', function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->category . '%');
            });
        }

        if ($request->filled('payment_mode')) {
            $query->where('paymentMode', $request->payment_mode);
        }

        if ($request->filled('status')) {
            $query->where('orderStatus', $request->status);
        }

        if ($request->filled('from')) {
            $query->whereDate('OrderDate', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('OrderDate', '<=', $request->to);
        }

        $orders = $query->get();

        return view('admin.admin_order', compact('orders'));
    }

}
