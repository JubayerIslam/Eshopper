<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showCategoryForm()
    {
        return view('backend.category.create');
    }

    public function categoryStore(Request $request)
    {
        request()->validate([
            'name' => 'required | max:255',
        ]);

        $category = new Category();
        $category->name = ucfirst($request->name);
        $category->slug = str_replace('-', ' ', strtolower($request->name));
        $category->save();
        session()->flash('success', 'Category Added Successfully');
        return redirect()->back();
    }

    public function manageCategoryList()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('backend.category.manage', compact('categories'));
    }

    public function showEditCategoryForm($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    public function editCategory(Request $request, $id)
    {
        request()->validate([
            'name' => 'required | max:255',
        ]);

    
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = str_replace('-', ' ', strtolower($request->name));
        $category->save();
        session()->flash('success', 'Category Updated Successfully');
        return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->category_delete_id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully!');
    }
}
