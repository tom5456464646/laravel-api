<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Income;

class DataController extends Controller
{
    public function index()
    {
        return view('data.index');
    }

    public function orders()
    {
        $orders = Order::latest()->paginate(20);
        return view('data.orders', compact('orders'));
    }

    public function sales()
    {
        $sales = Sale::latest()->paginate(20);
        return view('data.sales', compact('sales'));
    }

    public function stocks()
    {
        $stocks = Stock::latest()->paginate(20);
        return view('data.stocks', compact('stocks'));
    }

    public function incomes()
    {
        $incomes = Income::latest()->paginate(20);
        return view('data.incomes', compact('incomes'));
    }
}
