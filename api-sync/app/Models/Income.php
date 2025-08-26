<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $table = 'incomes';

    protected $fillable = [
        'income_id',
        'date',
        'total_amount',
        'expenses',
        'profit',
        'warehouse_name',
    ];
}
