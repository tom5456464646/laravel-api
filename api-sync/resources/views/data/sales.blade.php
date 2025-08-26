@extends('layouts.app')

@section('content')
<h2>Sales</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Sale ID</th>
            <th>Date</th>
            <th>Product Name</th>
            <th>Supplier Article</th>
            <th>Tech Size</th>
            <th>Barcode</th>
            <th>Total Price</th>
            <th>Quantity</th>
            <th>Discount Percent</th>
            <th>Warehouse</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td>{{ $sale->sale_id }}</td>
            <td>{{ $sale->date }}</td>
            <td>{{ $sale->product_name }}</td>
            <td>{{ $sale->supplier_article }}</td>
            <td>{{ $sale->tech_size }}</td>
            <td>{{ $sale->barcode }}</td>
            <td>{{ $sale->total_price }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>{{ $sale->discount_percent }}</td>
            <td>{{ $sale->warehouse_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $sales->links() }}
@endsection
