<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OpenPos extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'open_pos';

    protected $fillable = [
        'date_open',
        'hour_open',
        'value_previous_close',
        'value_open',
        'observation'
    ];

    public static function getDataOpen()
    {
        return OpenPos::select(
            'date_open',
            'hour_open',
            'value_previous_close',
            'value_open',
            'observation'
        );
    }

    public static function saveDataOpen($data)
    {
        return OpenPos::create($data);
    }

    public static function getValueOpen(): bool
    {
        if(OpenPos::select('value_open') == null) {
            return false;
        }
        else {
            return true;
        }
    }

}
