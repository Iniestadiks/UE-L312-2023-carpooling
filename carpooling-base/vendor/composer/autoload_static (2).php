<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit631ebf7d4ff65dd8542e281775a619b5
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit631ebf7d4ff65dd8542e281775a619b5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit631ebf7d4ff65dd8542e281775a619b5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit631ebf7d4ff65dd8542e281775a619b5::$classMap;

        }, null, ClassLoader::class);
    }
}
