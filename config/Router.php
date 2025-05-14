<?php

namespace Config;

class Router
{
    protected string $route;
    protected string $method;
    protected array $rutasRegistradas = [];

    public function __construct(string $route, string $method)
    {
        $this->route = trim($route, '/');
        $this->method = $method;

        $this->loadSubrutas();
    }

    protected function loadSubrutas()
    {
        $rutaDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'routes';
        $namespaceBase = 'Routes\\';

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rutaDir),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($iterator as $archivo) {
            if ($archivo->isFile() && $archivo->getExtension() === 'php') {
                // Obtener ruta relativa desde la carpeta routes
                $rutaRelativa = str_replace($rutaDir . DIRECTORY_SEPARATOR, '', $archivo->getPathname());

                // Reemplazar / por \ y eliminar .php para obtener nombre de clase completo
                $clase = $namespaceBase . str_replace(['/', '.php'], ['\\', ''], $rutaRelativa);

                if (class_exists($clase) && method_exists($clase, 'registrar')) $clase::registrar($this);
            }
        }
    }

    public function registrar(string $ruta, string $metodo, callable $callback)
    {
        $clave = strtoupper($metodo) . ':' . trim($ruta, '/');
        $this->rutasRegistradas[$clave] = $callback;
    }

    public function resolver()
    {
        $clave = strtoupper($this->method) . ':' . $this->route;

        if (isset($this->rutasRegistradas[$clave])) {
            $request = new Request();
            call_user_func($this->rutasRegistradas[$clave], $request);
        } else {
            ResponseHttp::jsonResponse(404, 'Ruta no encontrada');
        }
    }
}
