<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    public function showCategories()
    {
        $Categories = Categorie::all();
        $categories = Categorie::all();
        return view('admin/admin_categories_list' , compact('Categories','categories')); 
    }

    public function showCategories_user()
    {
        $Categories = Categorie::all();
        return view('menu' , compact('Categories')); 
    }

    public function add_categories(Request $request){
        $file = $request->file('image');

        // Validate user input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $fileName = $file->getClientOriginalName();
        $path = $request->file('image')->storeAs('public/menu_images',$fileName,'public');

        // Create a new categories instance
        $categories = Categorie::create([
            'name' => $request->name,   
            'description' => $request->description,
            'image' => $path, 
        ]);
        
        if($categories){
            return redirect()->route('admin_categories_list');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Check if a new file is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/menu_images', $fileName, 'public');
            $data['image'] = $path; // Update only if a new file is uploaded
        }

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('admin_categories_list');
    }

    public function delete($id)
    {
        $categories = Categorie::find($id);
        if(!is_null($categories))
        {
            $categories->delete();
        }
        return redirect('admin_categories_list');
    }

    public function view()
    {
        $categories = Categorie::onlyTrashed()->get();
        return view('admin/categories-trash',compact('categories'));
    }

    public function restore($id)
    {
        $categories = Categorie::withTrashed()->find($id);
        if(!is_null($categories))
        {
            $categories->restore();
        }
        return redirect('admin_categories_list');
    }

    public function permanentDelete($id)
    {
        $categories = Categorie::withTrashed()->find($id);
        if(!is_null($categories))
        {
            $categories->forceDelete();
        }
        return redirect('admin_categories_list');
    }
    public function menu_filter(Request $request)
    {
        $query = Categorie::query();

        if ($request->filled('category')) {
            $query->where('id', $request->category);
        }

        $Categories = $query->get();
        $categories = Categorie::all();

        return view('menu', compact('Categories','categories'));
    }
}
