@extends('layouts.app')

@section('content')
<h2>Stocks</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>SKU</th>
            <th>Warehouse Name</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stocks as $stock)
        <tr>
            <td>{{ $stock->sku }}</td>
            <td>{{ $stock->warehouse_name }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>{{ $stock->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $stocks->links() }}
@endsection
