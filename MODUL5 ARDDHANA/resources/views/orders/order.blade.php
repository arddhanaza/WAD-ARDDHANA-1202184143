@extends('templates/template')
@section('title','Order')
@section('order','active')
@section('container')
    @if($products->count() > 0)
        <div class="text-center mt-5">
            <h2>Order</h2>
        </div>
        <div class="row mt-5">
            @foreach($products as $product)
                <div class="col-4">
                    <div class="card h-100">
                        <div class="card-img-top overflow-hidden" style="height: 200px;">
                            <img src="{{asset('storage').'/'.$product->img_path}}" alt="" class="w-100">
                        </div>
                        <div class="card-body">
                            <div class="card-title">
                                {{$product->name}}
                            </div>
                            <div class="card-text">
                                <p>{{$product->description}}</p>
                            </div>
                            <div class="card-text">
                                <h3>$ {{$product->price}}</h3>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            @if($product->stock > 0)
                                <a href="{{route('create_order',$product->id)}}" class="btn btn-success">Order Now</a>
                            @else
                                <a href="{{route('create_order',$product->id)}}" class="btn btn-success disabled" >Out of Stock</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center mt-5">
            <span class="text-secondary">There is no data...</span>
            <br>
            <a href="{{route('create_product')}}" class="btn btn-dark mt-3">Add Product</a>
        </div>
    @endif
@endsection

