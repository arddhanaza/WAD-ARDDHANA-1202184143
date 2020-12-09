<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.products',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Products;
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->description = $request->product_description;
        $product->stock = $request->product_stock;
        if ($request->hasFile('product_image')){
            $product_image_name = time().$request->file('product_image')->getClientOriginalName();
            $request->product_image->storeAs('public',$product_image_name);
            $product->img_path = $product_image_name;
        }
        return redirect(route('show_products'));
	$product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit_product',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id);
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        $product->description = $request->product_description;
        $product->stock = $request->product_stock;
        if ($request->hasFile('product_image')){
            $product_image_name = time().$request->file('product_image')->getClientOriginalName();
            $request->product_image->storeAs('public',$product_image_name);
            $product->img_path = $product_image_name;
            Storage::delete('public/'.$request->old_product_image);
        }
        $product->save();
        return redirect(route('show_products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $file_name = $product->img_path;
        Storage::delete('public/'.$file_name);
        $product->delete();
        return redirect(route('show_products'));
    }

    public function show_product_to_order(){
        $products = Products::all();
        return view('orders.order',['products'=>$products]);
    }
}
