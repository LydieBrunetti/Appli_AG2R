<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb40022806901d3417a8793f88b5e8de4
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\Service\\' => 26,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\DependencyInjection\\' => 38,
            'Symfony\\Component\\Config\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
            'PHPMailer\\PHPMailer\\' => 20,
            'PDepend\\' => 8,
        ),
        'F' => 
        array (
            'Fpdf\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\Service\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/service-contracts',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\DependencyInjection\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/dependency-injection',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'PDepend\\' => 
        array (
            0 => __DIR__ . '/..' . '/pdepend/pdepend/src/main/php/PDepend',
        ),
        'Fpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/fpdf/fpdf/src/Fpdf',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PHPMD\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpmd/phpmd/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb40022806901d3417a8793f88b5e8de4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb40022806901d3417a8793f88b5e8de4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb40022806901d3417a8793f88b5e8de4::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
