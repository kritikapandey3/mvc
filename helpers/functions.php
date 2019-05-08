<?php
if(!function_exists('config')) {
    /**
     * Get specified configuration value.
     *
     * @param string $key
     * @return bool|string
     */
    function config($key) {
        include BASEDIR.'/config/settings.php';

        if(key_exists($key, $config)) {
            return $config[$key];
        }
        else {
            return false;
        }
    }
}

if(!function_exists('url')){
    function url($uri = '') {
        $base_url = config('base_url');
        return $base_url.$uri;
    }
}

if(!function_exists('redirect')) {
    function redirect($url) {
        header('location:'.$url);
    }
}

if(!function_exists('view')){
    function view($view_file = null, $data = []) {
        return new \System\Core\View($view_file, $data);
    }
}

if(!function_exists('current_user')) {
    function current_user($type) {
        if($type == 'admin') {
            $class_name = \App\Models\Admin::class;
        }
        else {
            $class_name = \App\Models\User::class;
        }

        $user = new $class_name;
        $user->load($_SESSION[$type]);
        return $user;
    }
}

if(!function_exists('login_check')) {
    function login_check ($type)
    {
        return !empty($_SESSION[$type]);
    }


}