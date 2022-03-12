<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9553b919fb90e7fc1c673cf94a087987
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Services\\Website\\' => 17,
            'Services\\Cms\\' => 13,
            'Services\\' => 9,
        ),
        'R' => 
        array (
            'Routers\\' => 8,
            'Repositories\\Website\\' => 21,
            'Repositories\\Cms\\' => 17,
            'Repositories\\' => 13,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\Website\\' => 20,
            'Controllers\\Cms\\' => 16,
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Services\\Website\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services/website',
        ),
        'Services\\Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services/cms',
        ),
        'Services\\' => 
        array (
            0 => __DIR__ . '/../..' . '/services',
        ),
        'Routers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/routers',
        ),
        'Repositories\\Website\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repositories/website',
        ),
        'Repositories\\Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repositories/cms',
        ),
        'Repositories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repositories',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Controllers\\Website\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/website',
        ),
        'Controllers\\Cms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers/cms',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9553b919fb90e7fc1c673cf94a087987::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9553b919fb90e7fc1c673cf94a087987::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9553b919fb90e7fc1c673cf94a087987::$classMap;

        }, null, ClassLoader::class);
    }
}
