@extends('templates/template')
@section('title','Product')
@section('product','active')
@section('container')
    @if($products->count() > 0)
    <div class="text-center mt-5">
        <h2>List Products</h2>
    </div>
    <div class="">
        <a href="{{route('create_product')}}" class="btn btn-dark">Add Product</a>

{{--        {{dd($products)}}--}}
        <table class="table table-borderless  mt-3">
            <tr class="bg-dark text-light">
                <th>#</th>
                <th class="w-50">Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('edit_product',$product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('delete_product',$product->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @else
        <div class="text-center mt-5">
            <span class="text-secondary">There is no data...</span>
            <br>
            <a href="{{route('create_product')}}" class="btn btn-dark mt-3">Add Product</a>
        </div>
    @endif
@endsection

