<?php
class Env {
     
    //Get Service URL
    public function GetFuncURL()
    {
        $env_filename = __DIR__ . '/env.ini';
        $_SESSION['env'] = parse_ini_file($env_filename, true);
    }
}