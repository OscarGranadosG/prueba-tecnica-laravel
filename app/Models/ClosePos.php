<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function saveDataClose($data)
    {
        return ClosePos::create($data);
    }

    public static function getResultClose()
    {
        return ClosePos::select('value_close');
    }

    public static function deleteDataClose()
    {
        DB::table('close_pos')->truncate();
    }
}
