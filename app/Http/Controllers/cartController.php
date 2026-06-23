<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Pizza;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class cartController extends Controller
{
    public function index()
    {
        $cartItems = cart::with('pizza', 'user')->where('userId', Auth::user()->id)->get();

        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->itemQuantity * $cartItem->pizza->pizzaPrice;
        });

        return view('cart', compact('cartItems', 'totalPrice'));
    }

    public function add(Request $request)
    {
        /*$cart = new cart();
        $cart->pizzaId = $request->itemId;
        $cart->userId = $request->userId;
        $cart->itemQuantity = 1;
        $cart->created_at = now();

        $cart->save();*/

        $userId = Auth::id();
        cart::updateOrCreate(
            [
                'pizzaId' => $request->itemId,
                'userId' => $userId
            ],
            [
                'itemQuantity' => 1,
                'created_at' => Carbon::now()
            ]
        );

        return redirect()->route('cart.index');
    }

    public function update(Request $request, $id)
    {
        $cartItem = cart::where('pizzaId', $id)->where('userId', Auth::id())->firstOrFail();

        $cartItem->itemQuantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $userId = Auth::id();

        cart::where('pizzaId', $id)->where('userId', $userId)->delete();

        return redirect()->route('cart.index');
    }

    public function clearCart()
    {
        $userId = Auth::id();

        cart::where('userId', $userId)->delete();

        return redirect()->route('cart.index');
    }
}
