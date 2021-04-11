<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9588f6571a0507668a90f951cc1496a4
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Woof\\Theme\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Woof\\Theme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class/Theme',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9588f6571a0507668a90f951cc1496a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9588f6571a0507668a90f951cc1496a4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9588f6571a0507668a90f951cc1496a4::$classMap;

        }, null, ClassLoader::class);
    }
}