@extends('templates/template')
@section('title','History')
@section('history','active')
@section('container')
    @if($history->count() > 0)
        <div class="text-center mt-5">
            <h2>History</h2>
        </div>
        <div class="">

            <table class="table table-borderless  mt-3">
                <tr class="bg-dark text-light">
                    <th>#</th>
                    <th class="w-25">Product</th>
                    <th>Buyer Name</th>
                    <th>Contact</th>
                    <th>Amount</th>
                </tr>
                @foreach($history as $order)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->buyer_name}}</td>
                        <td>{{$order->buyer_contact}}</td>
                        <td>$ {{$order->amount}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="text-center mt-5">
            <span class="text-secondary">There is no data...</span>
            <br>
            <a href="{{route('show_products_to_order')}}" class="btn btn-dark mt-3">Order Now</a>
        </div>
    @endif
@endsection

