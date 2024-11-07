<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => Product::get()]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg|max
            :2048'
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('product created!!!');
    }
    public function edit($id)
    {
        // dd($id);
        $product = Product::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all);
        $request->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,gif,svg|max
            :2048'
        ]);
        $product = product::where('id', $id)->first();
        if (isset($request->image)) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('product updated!!!');
    }

    public function destroy($id)
    {
        $product = product::where('id', $id)->first();
        $product->delete();

        return back()->withSuccess('product deleted!!!');
    }
    public function show($id)
    {
        $product = product::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }
}
