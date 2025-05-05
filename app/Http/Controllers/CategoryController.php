<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return view('categories.baseCategory', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nama = $request->input('name');

        $category = Category::create([
            'name' => $nama
        ]);

        if($category){
            return redirect('/category')->with('success', 'Register Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
        $category = Category::find($category->id);

        $category->name = $request->input('name');

        $category->save();

        return redirect('/category')->with('success', 'Update Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        if ($category) {
            $category->delete();
            return redirect('/category')->with('success', 'Delete Succesfully');
        }
    }
}
