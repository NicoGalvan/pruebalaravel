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
    public function listado()
    {
        return Category::get();
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

       // return redirect('/Categories')->with('success', 'User Data is successfully deleted'); full laravel

    }

    public function edit($id)
    {
        $categoriesid = Category::findOrFail($id);
        //return View('edit',compact('categoriesid')); para solo laravel sin vue
        return $categoriesid;

    }
    //
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'Nombre' => 'required',
            'Edad' => 'required',
        ]);
        Category::whereId($id)->update($validatedData);
       // return redirect('/Categories')->with('success', 'User Data is successfully updated'); para full laravel
       //return redirect()->route('categoria.index')                    para full laravel
         //               ->with('success','Post created successfully.');           para full laravel
         
    }
}
