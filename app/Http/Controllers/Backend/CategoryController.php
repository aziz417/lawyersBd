<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::latest()->paginate(10);        
        return view('backend.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'position'=>'required|max:255|unique:categories,position',
        ]);
        Category::create([
            'name' => $request->name,
            'position' => $request->position,
            
        ]);

        return redirect()->back()->with('success', 'Category have been successfully created');
    }


    public function edit(Category $category)
    {
        return view('backend.pages.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
        ]);
        $category->update([
            'name' => $request->name
            
        ]);
        return redirect()->route('categories.index')->with('success', 'Category have been successfully updated');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted success');
    }
}
