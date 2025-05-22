<?php

namespace App\Helpers;

class FileImg
{
    public static function SeeImgB64($urlBase, $fileName)
    {
        $urlBase = trim($urlBase, "/");
        $urlBase = str_replace("/", DIRECTORY_SEPARATOR, $urlBase);

        $ruta = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . $urlBase . DIRECTORY_SEPARATOR . $fileName;

        $contenido = file_get_contents($ruta);
        $mime = mime_content_type($ruta);
        $base64 = base64_encode($contenido);

        return "data:$mime;base64,$base64";
    }
}
