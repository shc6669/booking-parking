@extends('layouts.app')

@section('page-title', 'Show Orders')
@section('page-heading', 'Show Orders')

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('orders.index') }}">@lang('Orders')</a>
    </li>
    <li class="breadcrumb-item active">
        Show Orders
    </li>
@stop

@section('content')

@include('partials.messages')

<div class="card">
    <div class="card-header">
        <div class="pb-2">
            Order From : <b> {{$order->user->first_name}} {{$order->user->last_name}} </b>
        </div>
        <div class="pb-2">
            Restaurant : <b> {{$order->restaurant->name}} </b>
        </div>
        <div class="pb-2">
            Status Order : 
            @if($order->status == 0)
                <b>Processing</b>
            @elseif($order->status == 1)
                <b>Success</b>
            @else
                <b>Canceled</b>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 0;  
                    @endphp
                    @foreach($order_detail as $key => $value)
                    @php
                        $no++;
                    @endphp
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$value->menu->menu_name}}</td>
                        <td>{{$value->qty}}</td>
                        <td>{{$value->total_price}}</td>
                        <td>{{$value->notes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop