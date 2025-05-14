<?php

namespace App\Controllers;

use App\Models\NivelActividadModel;
use Config\ResponseHttp;

class NivelActividadController
{
    public static function listar()
    {
        $nivelActividadModel = new NivelActividadModel();
        $result = $nivelActividadModel->all();

        ResponseHttp::jsonResponse(200, null, $result);
    }
}
