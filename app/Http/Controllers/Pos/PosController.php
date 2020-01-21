<?php

namespace App\Http\Controllers\Pos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pos\PosDataManagement;
use Symfony\Component\HttpFoundation\JsonResponse;

class PosController extends Controller
{
    private $management;

    public function __construct()
    {
        $this->management = new PosDataManagement();
    }

    public function getOpenPos()
    {
        try {
            return response()
                ->json(['status' => 'Success',
                    'results' => $this->management->getDataOpenPos()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()
                ->json(['error' => $exception->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function saveOpenPos(Request $request)
    {
        $data = $request->all();
        $this->management->setData($data);

        try {
            return response()
                ->json(['msg' => 'Información guardada con exito',
                    'results' => $this->management->saveDataOpenPos()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()
                ->json(['error' => $exception->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getClosePos()
    {
        try {
            return response()
                ->json(['msg' => 'Success',
                    'results' => true,
                    'value' => $this->management->getDataClosePos()['value_cash'],
                    'close' => $this->management->getDataClosePos()['value_close'],
                    'card' => $this->management->getDataClosePos()['value_card']
                ])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()
                ->json(['error' => $exception->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function saveClosePos(Request $request)
    {
        $data = $request->all();
        $this->management->setData($data);

        try {
            return response()
                ->json(['msg' => 'Informacion guardada con exito',
                    'results' => $this->management->saveDataClosePos()])
                ->setStatusCode(JsonResponse::HTTP_OK);
        } catch (\Exception $exception) {
            return response()
                ->json(['error' => $exception->getMessage()])
                ->setStatusCode(JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
