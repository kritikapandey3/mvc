<?php

namespace System\Core;


class Initialize
{
    public function __construct()
    {
        session_start();
        date_default_timezone_set(config('timezone'));
    }

    public function start()
    {
        $url_parts = $this->getUrlParts();

        $this->loadController($url_parts);
    }

    private function getUrlParts()
    {
//       $base = config('base_url');
//
//        dd($_SERVER);

        $path = [];

        if(isset($_SERVER['PATH_INFO'])) {
            $path = explode('/', $_SERVER['PATH_INFO']);
        }

        $parts = [];

        if(!empty($path) && isset($path[1]) && !empty($path[1])) {
            $parts['controller'] = $path[1];
        }
        else {
            $parts['controller'] = config('default_controller');
        }

        if(isset($path[2]) && !empty($path[2])) {
            $parts['method'] = $path[2];
        }
        else {
            $parts['method'] = 'index';
        }

        if(isset($path[3]) && !empty($path[3])) {
            $parts['argument'] = $path[3];
        }
        else {
            $parts['argument'] = null;
        }

        return $parts;
    }

    private function loadController($parts)
    {
        $className = "\App\Controllers\\".ucfirst($parts['controller'])."Controller";

        $ctrl = new $className;

        if($ctrl instanceof BaseController) {
            if (is_null($parts['argument'])) {
                $ctrl->{$parts['method']}();
            } else {
                $ctrl->{$parts['method']}($parts['argument']);
            }
        }
        else {
            throw new NotControllerException("'{$className}' does not inherit '\System\Core\BaseController'.");
        }

    }

}