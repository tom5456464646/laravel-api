<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'sale_id',
        'date',
        'product_name',
        'supplier_article',
        'tech_size',
        'price',
        'quantity',
        'total_price',
        'warehouse_name',
    ];
}
