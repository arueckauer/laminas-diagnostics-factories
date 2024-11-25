<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactoriesTest;

use LaminasDiagnosticsFactories\GuzzleHttpServicePsrContainerFactory;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

#[CoversClass(GuzzleHttpServicePsrContainerFactory::class)]
class GuzzleHttpServicePsrContainerFactoryTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test__invoke(): void
    {
        $factory = new GuzzleHttpServicePsrContainerFactory('guzzle_http_service');

        $container = $this->createMock(ContainerInterface::class);
        $container
            ->expects(self::once())
            ->method('has')
            ->with('config')
            ->willReturn(true);
        $container
            ->expects(self::once())
            ->method('get')
            ->with('config')
            ->willReturn([
                'diagnostics' => [
                    'guzzle_http_service' => [
                        'label'        => 'Guzzle Http Service',
                        'requestOrUrl' => 'https://getlaminas.org/',
                        'headers'      => [],
                        'options'      => [],
                        'statusCode'   => 200,
                        'content'      => 'the enterprise-ready PHP Framework',
                        'guzzle'       => null,
                        'method'       => 'GET',
                        'body'         => null,
                    ],
                ],
            ]);

        $check = $factory($container);

        self::assertSame('Guzzle Http Service', $check->getLabel());
    }
}
