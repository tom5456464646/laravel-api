@extends('layouts.app')

@section('content')
<h2>Incomes</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Income ID</th>
            <th>Date</th>
            <th>Total Amount</th>
            <th>Orders Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($incomes as $income)
        <tr>
            <td>{{ $income->income_id }}</td>
            <td>{{ $income->date }}</td>
            <td>{{ $income->total_amount }}</td>
            <td>{{ $income->orders_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $incomes->links() }}
@endsection
