<?php

namespace Config;

use Utils\ArrayList;

class ResponseHttp
{
    private static $httpAnswers = array(
        [
            'codigo' => 200,
            'message' => 'Resultado exitoso',
            'status' => 'ok',
            'data' => []
        ],
        [
            'codigo' => 400,
            'message' => 'Solicitud enviada incompleta',
            'status' => 'error'
        ],
        [
            'codigo' => 404,
            'message' => 'No se ha encontradon el recurso',
            'status' => 'error'
        ],
        [
            'codigo' => 500,
            'message' => 'Error interno en el servidor',
            'status' => 'error'
        ]
    );

    private static function response(int $codigoHttp, $message = null, $data = null)
    {
        $response = ArrayList::getSegment($codigoHttp, 'codigo', self::$httpAnswers);

        if (!$response) {
            http_response_code(400);
            $response = ArrayList::getSegment(400, 'codigo', self::$httpAnswers);
            $response['message'] = 'Codigo Http no configurado en el api';
            return $response;
        }

        http_response_code($codigoHttp);

        if (!empty($message)) $response['message'] = $message;
        if (!empty($data) && $codigoHttp === 200) $response['data'] = $data;

        return $response;
    }

    public static function jsonResponse(int $codigoHttp, $message = null, $data = null)
    {
        $response = self::response($codigoHttp, $message, $data);

        // Devolver la respuesta en formato JSON
        echo json_encode($response);
        die();
    }
}
