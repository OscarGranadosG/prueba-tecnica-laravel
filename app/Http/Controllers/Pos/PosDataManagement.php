<?php

namespace App\Http\Controllers\Pos;

use App\Models\ClosePos;
use App\Models\OpenPos;

class PosDataManagement
{
    private $data;

    //Funcion para setear la data proveniente del Controlador
    public function setData($data) 
    {
        $this->data = $data;
    }

    public function getDataOpenPos()
    {
        return OpenPos::getDataOpen()->get()->toArray(); 
    }

    public function saveDataOpenPos()
    {
        $data = [
            'date_open' => $this->data['date_open'],
            'hour_open' => $this->data['hour_open'],
            'value_previous_close' => $this->data['value_previous_close'],
            'value_open' => $this->data['value_open'],
            'observation' => $this->data['observation']
        ];
        return OpenPos::saveDataOpen($data);
    }

    public function getDataClosePos()
    {
        return ClosePos::getDataClose()->get()->toArray();
    }

    public function saveDataClosePos()
    {
        $data = [
            'date_close' => $this->data['date_close'],
            'hour_close' => $this->data['hour_close'],
            'value_card' => $this->data['value_card'],
            'value_cash' => $this->data['value_cash'],
            'value_close' => $this->data['value_close'],
            'value_open' => $this->data['value_open'],
            'value_sales' => $this->data['value_sales']
        ];

        ClosePos::saveDataClose($data);
        return $this->data['value_sales'];
    }
}