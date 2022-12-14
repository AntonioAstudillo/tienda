<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit795e0c0aa3ea1c39b168ec54aeeb2afb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit795e0c0aa3ea1c39b168ec54aeeb2afb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit795e0c0aa3ea1c39b168ec54aeeb2afb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit795e0c0aa3ea1c39b168ec54aeeb2afb::$classMap;

        }, null, ClassLoader::class);
    }
}
