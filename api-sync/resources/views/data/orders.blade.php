@extends('layouts.app')

@section('content')
<h2>Orders</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>G Number</th>
            <th>Date</th>
            <th>Supplier Article</th>
            <th>Tech Size</th>
            <th>Barcode</th>
            <th>Total Price</th>
            <th>Discount Percent</th>
            <th>Warehouse</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->g_number }}</td>
            <td>{{ $order->date }}</td>
            <td>{{ $order->supplier_article }}</td>
            <td>{{ $order->tech_size }}</td>
            <td>{{ $order->barcode }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->discount_percent }}</td>
            <td>{{ $order->warehouse_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $orders->links() }}
@endsection
