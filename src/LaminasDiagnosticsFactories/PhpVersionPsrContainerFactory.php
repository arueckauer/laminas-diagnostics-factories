<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\PhpVersion;
use Psr\Container\ContainerInterface;

final class PhpVersionPsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): PhpVersion
    {
        $this->container = $container;
        $params          = $this->getParams();

        $check = new PhpVersion(
            $this->getExpectedVersion($params),
            $this->getOperator($params)
        );
        $check->setLabel($this->getLabel($params));

        return $check;
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
