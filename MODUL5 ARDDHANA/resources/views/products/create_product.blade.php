@extends('templates/template')
@section('title','Create Product')
@section('product','active')
@section('container')
    <div class="text-center mt-5">
        <h2>Input Product</h2>
    </div>
    <div class="mt-3">
        <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price_prepend">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="price_prepend">$ USD</span>
                    </div>
                    <input type="number" class="form-control" id="product_price" name="product_price" aria-describedby="price_prepend" required>
                </div>
            </div>
            <div class="form-group">
                <label for="product_description">Description</label>
                <textarea name="product_description" id="product_description" rows="5" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="product_stock">Stock</label>
                <input type="number" name="product_stock" id="product_stock" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product_image">Image File Input</label>
                <input type="file" name="product_image" id="product_image" class="form-control-file" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
@endsection

