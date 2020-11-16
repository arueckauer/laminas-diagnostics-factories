<?php

declare(strict_types=1);

use arueckauer\LaminasDiagnosticsFactories\Service\CpuPerformancePsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\DirWritablePsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\DiskFreePsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\ExtensionLoadedPsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\GuzzleHttpServicePsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\PDOCheckPsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\PhpVersionPsrContainerFactory;
use arueckauer\LaminasDiagnosticsFactories\Service\SecurityAdvisoryPsrContainerFactory;

return [
    'diagnostics' => [
        'cpu_performance'        => [
            'minPerformance' => 0.5,
        ],
        'free_tmp_disk'          => [
            'size' => '100MB',
            'path' => '/tmp',
        ],
        'writable_tmp_directory' => [
            'path' => '/tmp',
        ],
        'php_extensions'         => [
            'extensionName' => [
                'gd',
                'pdo',
                'simplexml',
            ],
        ],
        'laminas_ping'           => [
            'requestOrUrl' => 'https://getlaminas.org/',
            'headers'      => [],
            'options'      => [],
            'statusCode'   => 200,
            'content'      => 'the enterprise-ready PHP Framework',
            'guzzle'       => null,
            'method'       => 'GET',
            'body'         => null,
        ],
        'mezzio_ping'            => [
            'requestOrUrl' => 'https://docs.mezzio.dev/',
            'headers'      => [],
            'options'      => [],
            'statusCode'   => 200,
            'content'      => 'PSR-15 Middleware in Minutes',
            'guzzle'       => null,
            'method'       => 'GET',
            'body'         => null,
        ],
        'mysql_connection'       => [
            'dsn'      => 'mysql://localhost/my_database',
            'username' => 'my_username',
            'password' => 'oFPZc!W&zV>,YCrz',
            'timeout'  => 1,
        ],
        'php_version'            => [
            'expectedVersion' => '7.4',
            'operator'        => '>=',
        ],
        'security_advisory'      => [
            'lockFilePath' => __DIR__ . '/../composer.lock',
        ],
    ],
    'di'          => [
        'CpuPerformance'   => [CpuPerformancePsrContainerFactory::class, 'cpu_performance'],
        'FreeTmpDisk'      => [DiskFreePsrContainerFactory::class, 'free_tmp_disk'],
        'WritableTmpDir'   => [DirWritablePsrContainerFactory::class, 'writable_tmp_dir'],
        'PhpExtensions'    => [ExtensionLoadedPsrContainerFactory::class, 'php_extensions'],
        'LaminasPing'      => [GuzzleHttpServicePsrContainerFactory::class, 'laminas_ping'],
        'MezzioPing'       => [GuzzleHttpServicePsrContainerFactory::class, 'mezzio_ping'],
        'MysqlConnection'  => [PDOCheckPsrContainerFactory::class, 'mysql_connection'],
        'PhpVersion'       => [PhpVersionPsrContainerFactory::class, 'php_version'],
        'SecurityAdvisory' => [SecurityAdvisoryPsrContainerFactory::class, 'security_advisory'],
    ],
];
