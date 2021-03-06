<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitae14b612d17bf087c06f74da426c68df
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Go4tech\\Moviex\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Go4tech\\Moviex\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitae14b612d17bf087c06f74da426c68df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitae14b612d17bf087c06f74da426c68df::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitae14b612d17bf087c06f74da426c68df::$classMap;

        }, null, ClassLoader::class);
    }
}
