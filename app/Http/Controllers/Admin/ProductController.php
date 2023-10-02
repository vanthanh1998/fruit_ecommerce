<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // Save the image to the desired directory
            $path = public_path('admin/img/products/' . $filename);
            file_put_contents($path, file_get_contents($image));

            // Save the filename to the database (assuming the table has a column named 'image')
            $data['image'] = $filename;
        }
        Product::create($data);

        return redirect()->route('products')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::with('category')->findOrFail($id);
//        dd($product->category->name);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, int $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // delete image old
            if ($product->image && file_exists(public_path('admin/img/products/' . $product->image))) {
                unlink(public_path('admin/img/products/' . $product->image));
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            // save image new
            $path = public_path('admin/img/products/' . $filename);
            file_put_contents($path, file_get_contents($image));

            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect()->route('products')->with('success', 'product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products')->with('success', 'product deleted successfully');
    }
}
