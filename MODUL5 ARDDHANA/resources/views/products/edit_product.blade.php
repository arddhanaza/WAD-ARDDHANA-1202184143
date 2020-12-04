@extends('templates/template')
@section('title','Edit Product')
@section('product','active')
@section('container')
    <div class="text-center mt-5">
        <h2>Edit Product</h2>
    </div>
    <div class="mt-3">
        <form action="{{route('save_edit_product',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" value="{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label for="price_prepend">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="price_prepend">$ USD</span>
                    </div>
                    <input type="number" class="form-control" id="product_price" name="product_price" aria-describedby="price_prepend" placeholder="Name" value="{{$product->price}}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="product_description">Description</label>
                <textarea name="product_description" id="product_description" rows="5" class="form-control" placeholder="Contact" required>{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="product_stock">Stock</label>
                <input type="number" name="product_stock" id="product_stock" class="form-control" placeholder="Quantity" value="{{$product->stock}}" required>
            </div>
            <div class="form-group">
                <label for="product_image">Image File Input</label>
                <input type="file" name="product_image" id="product_image" class="form-control-file">
                <input type="hidden" name="old_product_image" value="{{$product->img_path}}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
@endsection

