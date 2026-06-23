<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Categorie;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function showPizzas($id)
    {
        $category = categories::findOrFail($id);
        $pizzas = Pizza::where('pizzaCategorieId', $id)->get();

        return view('item', compact('category', 'pizzas'));
    } 

    public function showItem()
    {
        $categories = categories::all();
        $pizzas = Pizza::all();
        return view('admin/admin_item_list', compact('categories', 'pizzas'));
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('viewPizza', compact('pizza'));
    }

    public function add_Item(Request $request)
    {
        $file = $request->file('pizzaPhoto');

        $request->validate([
            'pizzaName' => 'required|string|unique:pizzas,pizzaName',
            'pizzaPrice' => 'required|integer|min:0',
            'pizzaDesc' => 'required|string',
            //'pizzaCategorieId' => 'required|exists:categories,id',
            'pizzaPhoto' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $fileName = $file->getClientOriginalName();
        $path = $request->file('pizzaPhoto')->storeAs('public/pizza_images',$fileName,'public');

        $pizzas = Pizza::create([
            'pizzaName' => $request->pizzaName,
            'pizzaPrice' => $request->pizzaPrice,
            'pizzaDesc' => $request->pizzaDesc,
            'pizzaCategorieId' => $request->pizzaCategorieId,
            'pizzaPhoto' => $path,
        ]);

        if($pizzas){
            return redirect()->route('admin_item_list');
        }
    }

    // Update pizza details
    public function update(Request $request, $id)
    {
        $data = [
            'pizzaName' => $request->name,
            'pizzaDesc' => $request->desc,
            'pizzaPrice' => $request->price,
            'pizzaCategorieId' => $request->catId,
        ];

        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/pizza_images', $fileName, 'public');
            $data['pizzaPhoto'] = $path; // Update only if a new file is uploaded
        }

        DB::table('pizzas')->where('pizzaId', $id)->update($data);

        return redirect()->route('admin_item_list');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Query items based on the search term
        $pizzas = Pizza::where('pizzaName', 'LIKE', "%{$search}%")
            ->orWhere('pizzaDesc', 'LIKE', "%{$search}%")
            ->paginate(10); // Paginate results

        return view('search', compact('pizzas', 'search'));
    }

    public function delete($id)
    {
        $pizzas = Pizza::find($id);
        if(!is_null($pizzas))
        {
            $pizzas->delete();
        }
        return redirect('admin_item_list');
    }

    public function view()
    {
        $pizzas = Pizza::onlyTrashed()->get();
        return view('admin/item-trash',compact('pizzas'));
    }

    public function restore($id)
    {
        $pizzas = Pizza::withTrashed()->find($id);
        if(!is_null($pizzas))
        {
            $pizzas->restore();
        }
        return redirect('admin_item_list');
    }

    public function permanentDelete($id)
    {
        $pizzas = Pizza::withTrashed()->find($id);
        if(!is_null($pizzas))
        {
            $pizzas->forceDelete();
        }
        return redirect('admin_item_list');
    }
    public function items_filter(Request $request, $categoryId)
    {
        $category = categories::findOrFail($categoryId);
        $query = Pizza::where('pizzaCategorieId', $categoryId); 

        if ($request->filled('sort')) {
            $direction = $request->sort == 'asc' ? 'asc' : 'desc';
            $query->orderBy('pizzaPrice', $direction);
        }

        $pizzas = $query->get();

        return view('item', compact('category','pizzas'));
    }
}