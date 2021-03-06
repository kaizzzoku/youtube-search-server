<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcae64150ec02ce1a78a9b77be4070dcc
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcae64150ec02ce1a78a9b77be4070dcc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcae64150ec02ce1a78a9b77be4070dcc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcae64150ec02ce1a78a9b77be4070dcc::$classMap;

        }, null, ClassLoader::class);
    }
}
