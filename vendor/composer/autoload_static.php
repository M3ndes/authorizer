<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit32e20f2f5fa3a279eb4901f8ab9cf269
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit32e20f2f5fa3a279eb4901f8ab9cf269::$classMap;

        }, null, ClassLoader::class);
    }
}