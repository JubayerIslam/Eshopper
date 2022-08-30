<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function showBrandForm()
    {
        $categories = Category::get();
        return view('backend.brand.create', compact('categories'));
    }

    public function brandStore(Request $request)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required | max:255',
        ]);


        $brands = new Brand();
        $brands->category_id = $request->category_id;
        $brands->name = ucfirst($request->name);
        $brands->slug = str_replace('-', ' ', strtolower($request->name));
        $brands->save();
        return redirect()->back()->with('success', 'Brand Added Successfully');
    }

    public function manageBrandList()
    {
        $brands = Brand::with('category')->orderBy('created_at', 'desc')->get();
        return view('backend.brand.manage', compact('brands'));
    }

    public function showEditBrandForm($id)
    {
        $brands = Brand::find($id);
        $categories = Category::get();
        return view('backend.brand.edit', compact('brands', 'categories'));
    }

    public function editBrand(Request $request, $id)
    {
        request()->validate([
            'category_id' => 'required',
            'name' => 'required | max:255',
        ]);

        $brands = Brand::find($id);
        $brands->category_id = $request->category_id;
        $brands->name = ucfirst($request->name);
        $brands->slug = str_replace('-', ' ', strtolower($request->name));
        $brands->save();
        return redirect()->back()->with('success', 'Brand Updated Successfully');
    }

    public function deleteBrand(Request $request)
    {
        $Brand = Brand::find($request->brand_delete_id);
        $Brand->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }
}
