<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductForm()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('backend.product.create', compact('categories', 'brands'));
    }

    public function productStore(Request $request)
    {

  

        request()->validate([
            'name'             => 'required | min:3 | max:255',
            'category_id'      => 'required | integer',
            'brand_id'         => 'required | integer',
            'price'            => 'required',
            'qty'              => 'required',
            'sku'              => 'required',
            'shortDescription' => 'required',
            'longDescription'  => 'required',
            'image'            => 'required',

        ]);


  
        if($request->file('image')){
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move('product/img/', $imageName);
        }

        $product = new Product();
        $product->name        = $request->name;
        $product->brand_id    = $request->brand_id;
        $product->price       = $request->price;
        $product->quantity    = $request->qty;
        $product->sku         = $request->sku;
        $product->short_desc  = $request->shortDescription;
        $product->long_desc   = $request->longDescription;
        $product->image       = $imageName;
        $product->save();
        return redirect()->back()->with('success', 'Product Added Successfully');

    }

    public function ManageProduct()
    {
        $products = Product::with('category', 'brand')->get();
        return view('backend.product.manage', compact('products'));
    }

    public function showEditProductForm($id)
    {
        $product = Product::find($id);
        $categories = Category::orderBy('created_at', 'desc')->get();
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('backend.product.edit', compact('categories', 'brands', 'product'));
    }

    public function editProduct(Request $request, $id)
    {


        request()->validate([
            'name'             => 'required | min:3 | max:255',
            'category_id'      => 'required | integer',
            'brand_id'         => 'required | integer',
            'price'            => 'required',
            'qty'              => 'required',
            'sku'              => 'required',
            'shortDescription' => 'required',
            'longDescription'  => 'required',
            'image'            => 'required',

        ]);


  
        if($request->file('image')){
            $imageName = time(). '.' .$request->image->extension();
            $request->image->move('product/img/', $imageName);
        }

        $product = Product::find($id);
        $product->name        = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id    = $request->brand_id;
        $product->price       = $request->price;
        $product->quantity    = $request->qty;
        $product->sku         = $request->sku;
        $product->short_desc  = $request->shortDescription;
        $product->long_desc   = $request->longDescription;
        $product->image       = $imageName;
        $product->save();
        return redirect()->back()->with('success', 'Product Updated Successfully');

    }
}
