<?php

declare(strict_types=1);

use LaminasDiagnosticsFactories\CpuPerformancePsrContainerFactory;
use LaminasDiagnosticsFactories\DirWritablePsrContainerFactory;
use LaminasDiagnosticsFactories\DiskFreePsrContainerFactory;
use LaminasDiagnosticsFactories\ExtensionLoadedPsrContainerFactory;
use LaminasDiagnosticsFactories\GuzzleHttpServicePsrContainerFactory;
use LaminasDiagnosticsFactories\PDOCheckPsrContainerFactory;
use LaminasDiagnosticsFactories\PhpVersionPsrContainerFactory;
use LaminasDiagnosticsFactories\SecurityAdvisoryPsrContainerFactory;

return [
    'diagnostics' => [
        'cpu_performance'        => [
            'label'          => 'CPU Performance',
            'minPerformance' => 0.5,
        ],
        'free_tmp_disk'          => [
            'label' => 'Free Disk Space',
            'size'  => '100MB',
            'path'  => '/tmp',
        ],
        'writable_tmp_directory' => [
            'label' => 'Writable temp directory',
            'path'  => '/tmp',
        ],
        'php_extensions'         => [
            'label'         => 'PHP extensions',
            'extensionName' => [
                'gd',
                'pdo',
                'simplexml',
            ],
        ],
        'laminas_ping'           => [
            'label'        => 'Laminas Project',
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
            'label'        => 'Mezzio Project',
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
            'label'    => 'MySQL Connection',
            'dsn'      => 'mysql://localhost/my_database',
            'username' => 'my_username',
            'password' => 'oFPZc!W&zV>,YCrz',
            'timeout'  => 1,
        ],
        'php_version'            => [
            'label'           => 'PHP version',
            'expectedVersion' => '7.4',
            'operator'        => '>=',
        ],
        'security_advisory'      => [
            'label'        => 'Security Advisory',
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
