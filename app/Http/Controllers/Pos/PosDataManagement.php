<?php

namespace App\Http\Controllers\Pos;

use App\Models\ClosePos;
use App\Models\ExpensesPos;
use App\Models\OpenPos;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;

class PosDataManagement
{
    private $data;

    //Funcion para setear la data proveniente del Controlador
    public function setData($data) 
    {
        $this->data = $data;
    }

    //Apertura de caja
    public function getDataOpenPos()
    {
        return OpenPos::getDataOpen()->get()->toArray(); 
    }

    public function updateDataOpen()
    {
        try {
            DB::beginTransaction();
                $this->deleteDataOpen();
                return $this->saveDataOpenPos();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage(), 500);
        }
    }

    public function saveDataOpenPos()
    {
        $data = [
            'date_open' => date($this->data['date_open']),
            'hour_open' => $this->data['hour_open'],
            'value_previous_close' => $this->data['value_previous_close'],
            'value_open' => $this->data['value_open'],
            'observation' => $this->data['observation']
        ];
        return OpenPos::saveDataOpen($data);
    }

    private function deleteDataOpen()
    {
        return OpenPos::deleteDataOpen();
    }


    //Cierre de caja
    public function getDataClosePos()
    {
        $expenses = ExpensesPos::getCloseData()->get()->toArray();
        $value_open = OpenPos::getValueOpen()->get()->toArray();

        return array_merge($expenses, $value_open);
    }

    public function updateDataClose()
    {
        try {
            DB::beginTransaction();
                $this->deleteDataClose();
                $this->saveDataClosePos();
                return ClosePos::getResultClose()->get();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new Exception($exception->getMessage(), 500);
        }
    }

    public function saveDataClosePos()
    {
        $data = [
            'date_close' => date($this->data['date_close']),
            'hour_close' => $this->data['hour_close'],
            'value_card' => $this->data['value_card'],
            'value_cash' => $this->data['value_cash'],
            'value_close' => $this->data['value_close'],
            'value_open' => $this->data['value_open'],
            'value_sales' => $this->data['value_sales']
        ];
        ClosePos::saveDataClose($data);
        
    }

    private function deleteDataClose() {
        return ClosePos::deleteDataClose();
    }

    //Guarda venta
    public function saveSaleData()
    {
        $data_sale = [
            'name' => $this->data['name'],
            'value_card' => $this->data['value_card'],
            'value_cash' => $this->data['value_cash'],
            'value' => $this->data['value_card'] + $this->data['value_cash'] 
        ];
        ExpensesPos::saveSale($data_sale);
        return $this->data['value_card'] + $this->data['value_cash'];
    }
}