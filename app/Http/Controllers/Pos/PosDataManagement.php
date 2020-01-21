<?php

namespace App\Http\Controllers\Pos;

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
        $dataOpen = [
            'date_open' => '2019/06/11',
            'hour_open' => '12:45',
            'value_previous_close' => '6280',
            'value_open' => null,
            'observation' => ''
        ];
        return $dataOpen; 
    }

    public function saveDataOpenPos()
    {
        $saveModel = [
            'date_open' => $this->data['date_open'],
            'hour_open' => $this->data['hour_open'],
            'value_previous_close' => $this->data['value_previous_close'],
            'value_open' => $this->data['value_open'],
            'observation' => $this->data['observation']
        ];
        return $saveModel;
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