<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClosePos extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'close_pos';

    protected $fillable = [
        'date_close',
        'hour_close',
        'value_card',
        'value_cash',
        'value_close',
        'value_open',
        'value_sales'
    ];

    public static function getDataClose()
    {
        return ClosePos::select(
            'date_close',
            'hour_close',
            'value_card',
            'value_cash',
            'value_close',
            'value_open',
            'value_sales'
        );
    }
}
