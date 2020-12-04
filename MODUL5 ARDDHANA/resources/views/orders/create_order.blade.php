@extends('templates/template')
@section('title','Create Order')
@section('order','active')
@section('container')
    <div class="text-center mt-5">
        <h2>Order</h2>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-8">
                        <img src="{{asset('storage').'/'.$product->img_path}}" alt="" class="w-100">
                    </div>
                    <div class="col-4 py-3">
                        <h3>{{$product->name}}</h3>
                        <p>
                            {{$product->description}}
                        </p>
                        <p>
                            Stock : {{$product->stock}}
                        </p>
                        <h3>$ {{$product->price}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <div class="col-12 p-5">
                        <h3>Buyer Information</h3>
                        <form action="{{route('store_order',$product->id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="order_buyer_name">Name</label>
                                <input type="text" name="order_buyer_name" id="order_buyer_name" class="form-control"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="order_buyer_contact">Contact</label>
                                <input type="text" name="order_buyer_contact" id="order_buyer_contact"
                                       class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="order_buyer_quantity">Quantity</label>
                                <input type="number" name="order_buyer_quantity" id="order_buyer_quantity"
                                       class="form-control" required max="{{$product->stock}}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

