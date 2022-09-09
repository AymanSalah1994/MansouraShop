<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products  = Product::all() ; 
        return view('product.index' , compact('products')) ;  
    }

    public function create()
    {
        return view('product.create') ; 
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        //TODO : Remove it From REsource 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //  {{-- dispay none and still visible inspect --}}
        // TODO : Delete Protection 
        if($product['product_picture']) {
            // In Case it Has a Photo
            // Because Photo is Nullable & Can Be Empty
            Storage::delete($product['product_picture']) ;
        }
        $product->delete() ; 
        return redirect()->route('products.index')->with('status' , 'Product Deleted Successfully') ;
    }
}
