<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d97116774de6d908e1f7116f5f96fd3
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\composer\\' => 13,
            'yii\\' => 4,
        ),
        'v' => 
        array (
            'vendor\\gamantha\\pao\\project\\' => 28,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'vendor\\gamantha\\pao\\project\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
            1 => __DIR__ . '/..' . '/gamantha/pao-project',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d97116774de6d908e1f7116f5f96fd3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d97116774de6d908e1f7116f5f96fd3::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit4d97116774de6d908e1f7116f5f96fd3::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
