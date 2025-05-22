<?php

namespace App\Controllers;

use App\Helpers\FileImg;
use App\Models\NivelActividadModel;
use Config\ResponseHttp;

class NivelActividadController
{
    public static function listar()
    {
        $nivelActividadModel = new NivelActividadModel();
        $result = $nivelActividadModel->all();

        foreach ($result as $key => $value) {
            $result[$key]['ccniac_urlimg'] = FileImg::SeeImgB64("storage/uploads/nivel-actividad", $value['ccniac_urlimg']);
        }

        ResponseHttp::jsonResponse(200, null, $result);
    }
}
