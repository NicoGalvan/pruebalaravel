<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return View('Category',['categories' =>  $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Edad' => 'required',
        ]);
    
        Category::create($request->all());
     
        return redirect()->route('categoria.index')
                        ->with('success','Post created successfully.');
        
    }

    public function select()
    {
        $categories = Category::all();
        //return View('tabla',['categories' =>  $categories]);
        return View('tabla',compact('categories'));
    }

    public function destroy($id)
    {
        $categoriesid = Category::findOrFail($id);
        $categoriesid ->delete();

        return redirect('/Categories')->with('success', 'User Data is successfully deleted');
    }

    public function edit($id)
    {
        $categoriesid = Category::findOrFail($id);
        return View('edit',compact('categoriesid'));
    }
    //
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'Nombre' => 'required',
            'Edad' => 'required',
        ]);
        Category::whereId($id)->update($validatedData);
        return redirect('/Categories')->with('success', 'User Data is successfully updated');
    }
}
