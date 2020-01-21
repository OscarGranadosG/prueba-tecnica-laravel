<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpensesPos extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'value'
    ];
}
