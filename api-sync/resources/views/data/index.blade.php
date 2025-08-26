@extends('layouts.app')

@section('content')
<h1>API Data Viewer</h1>
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data.orders') }}">Orders</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data.sales') }}">Sales</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data.stocks') }}">Stocks</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('data.incomes') }}">Incomes</a>
    </li>
</ul>
<p>Выберите вкладку для просмотра данных.</p>
@endsection
