<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpensesPos extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'value_card',
        'value_cash',
        'value'
    ];

    public static function saveSale($data)
    {
        ExpensesPos::create($data);
    }

    public static function getCloseData()
    {
        return ExpensesPos::select(
            DB::raw('SUM(expenses.value_card) as value_card'),
            DB::raw('SUM(expenses.value_cash) as value_cash'),
            DB::raw('SUM(expenses.value_cash)+SUM(expenses.value_card) as value_sales')
        );
    }
}
