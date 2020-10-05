<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite84d7563d381ee7020ac9705d6d9d10a
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
        'App\\DB\\Sql' => __DIR__ . '/../..' . '/app/src/DB/Sql.php',
        'App\\Model\\ClientModel' => __DIR__ . '/../..' . '/app/src/model/ClientModel.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite84d7563d381ee7020ac9705d6d9d10a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite84d7563d381ee7020ac9705d6d9d10a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite84d7563d381ee7020ac9705d6d9d10a::$classMap;

        }, null, ClassLoader::class);
    }
}
