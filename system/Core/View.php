<?php
namespace System\Core;


class View
{
    public function __construct($file_path = null, $data = [])

    {
        if(!is_null($file_path)){
            $this->load($file_path, $data);
        }
    }

    public function load($file_path, $data = [])
    {
        $base_path = BASEDIR.'/views/';

        if(!strpos($file_path, '.php')) {
            $file_path .= ".php";
        }

        $view_file = $base_path.$file_path;

        extract($data);

        include_once $view_file;

    }
}