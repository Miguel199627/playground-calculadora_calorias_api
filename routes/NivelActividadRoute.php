<?php

namespace Routes;

use App\Controllers\NivelActividadController;

class NivelActividadRoute
{
    public static function registrar($router)
    {
        $router->registrar('nivel-actividad/listar', 'GET', [NivelActividadController::class, 'listar']);
    }
}
