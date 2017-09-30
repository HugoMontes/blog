<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(5);

        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:120|required|unique:categories',
        ]);

        $category = new Category($request->all());
        $category->save();

        flash("La categoría $category->name ha sido creada con éxito.")->success()->important();

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'max:120|required|unique:categories',
        ]);

        $category->fill($request->all());
        $category->save();

        flash("La categoría se actualizó con éxito.")->success()->important();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        flash("La categoría $category->name ha sido eliminada con éxito.")->success()->important();

        return redirect()->route('categories.index');
    }
}
