<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit881a2851c09bec629c50ba0807e7e977
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
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit881a2851c09bec629c50ba0807e7e977::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit881a2851c09bec629c50ba0807e7e977::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit881a2851c09bec629c50ba0807e7e977::$classMap;

        }, null, ClassLoader::class);
    }
}
