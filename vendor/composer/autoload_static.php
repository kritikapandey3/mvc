<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit96ab7e27ea4d0afa4730920f8ee4e11b
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '25072dd6e2470089de65ae7bf11d3109' => __DIR__ . '/..' . '/symfony/polyfill-php72/bootstrap.php',
        '667aeda72477189d0494fecd327c3641' => __DIR__ . '/..' . '/symfony/var-dumper/Resources/functions/dump.php',
        '0c3687696cc31d59270cd0b16e0bc0ee' => __DIR__ . '/../..' . '/helpers/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\' => 7,
            'Symfony\\Polyfill\\Php72\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\VarDumper\\' => 28,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/system',
        ),
        'Symfony\\Polyfill\\Php72\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php72',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit96ab7e27ea4d0afa4730920f8ee4e11b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit96ab7e27ea4d0afa4730920f8ee4e11b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
