<?php

namespace App\Http\Controllers\Pos;

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
        $dataClose = [
            'msg' => 'Success',
            'results' => true,
            'value' => '5000',
            'close' => '0',
            'card' => '0'
        ];
        return  $dataClose;
    }
}