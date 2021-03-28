<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.attrtibute.category.create');
    }

    public function submitCreate(AdminCategoryRequest $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug = Str::slug($request->name);
        $category->save();
        return redirect()->route('view-category');
    }

    public function view(Request $request)
    {
        $category = Categories::query();

        $categorys = $category->latest('id')->paginate(20);
        return view('admin.attrtibute.category.index', compact('categorys'));
    }

    public function edit(Request $request)
    {
        $category = Categories::find($request->id);
        return view('admin.attrtibute.category.edit', compact('category'));
    }

    public function submitEdit(AdminCategoryRequest $request)
    {
        $category = Categories::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->input('is-change-slug') == 'on') {
            $category->slug = Str::slug($request->name);
        } else {
            $category->slug = $request->slug;
        }
        $category->save();
        return redirect()->route('view-category');
    }

    public function delete(Request $request)
    {
        $category = Categories::find($request->id);
        $category->delete();
        return redirect()->route('view-category');
    }
}
