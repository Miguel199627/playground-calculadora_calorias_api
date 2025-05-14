<?php

namespace Utils;

use Dotenv\Dotenv;

class Env
{
    public static function getEnv(string $varJwtEnv)
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();
        return $_ENV[$varJwtEnv];
    }
}
