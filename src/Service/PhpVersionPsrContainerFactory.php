<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\PhpVersion;
use Psr\Container\ContainerInterface;

final class PhpVersionPsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): PhpVersion
    {
        $this->container = $container;
        $params          = $this->getParams();

        return new PhpVersion(
            $this->getExpectedVersion($params),
            $this->getOperator($params)
        );
    }

    private function getExpectedVersion(array $params): string
    {
        return $params['expectedVersion'];
    }

    private function getOperator(array $params): string
    {
        return $params['operator'] ?? '>=';
    }
}
