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

    public function index(Request $request)
    {
        $perPage = $request->perPage ?: 10;
        $keyword = $request->keyword;

        $categories = Category::query();

        if ($keyword) {

            $keyword = '%' . $keyword . '%';

            $categories = $categories->where('title', 'like', $keyword);
        }

        $categories = $categories->latest()->paginate($perPage);

        return view('backend.pages.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('backend.pages.categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'position' => 'required',
        ]);

        DB::beginTransaction();
        try {


            Category::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'position' => $request->position,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Category created successfully');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }

    /*    public function show(categories $categories)
        {
            return view('backend.categoriess.show', compact('categories'));
        }*/


    public function edit(Category $category)
    {
        return view('backend.pages.categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'position' => 'required',
        ]);

        DB::beginTransaction();
        try {

            $category->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'position' => $request->position,
            ]);

            DB::commit();

            return redirect()->route('categories.index')->with('success', 'Category have been successfully updated');

        } catch (\Exception $exception) {
            report($exception);
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }

    }


    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category have been successfully deleted');
        }
        abort(404);
    }
}
