<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = Orders::getAllData();
        return view('orders.history_orders',['history'=>$history]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Products::find($id);
        return view('orders.create_order',['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $order = new Orders();
        $product = Products::find($id);


        $order->product_id = $id;
        $order->amount = $request->order_buyer_quantity * $product->price;
        $order->buyer_name = $request->order_buyer_name;
        $order->buyer_contact = $request->order_buyer_contact;

        $product->stock = $product->stock - $request->order_buyer_quantity;
        $product->save();
        $order->save();

        return redirect(route('create_order',$id));
    }
}
