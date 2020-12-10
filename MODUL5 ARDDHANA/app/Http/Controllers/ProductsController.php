<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.products',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
        $product->save();
        return redirect(route('show_products'));

    }

    /**
     * Display the specified resource.
     *
     * @param Products $products
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Products $products
     * @return Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.edit_product',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Products $products
     * @return Response
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
     * @param Products $products
     * @return Response
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
