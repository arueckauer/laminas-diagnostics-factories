<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\PhpVersion;
use Override;
use Psr\Container\ContainerInterface;

final class PhpVersionPsrContainerFactory extends AbstractPsrContainerFactory
{
    #[Override]
    public function __invoke(ContainerInterface $container): PhpVersion
    {
        $params = $this->getParams($container);

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
