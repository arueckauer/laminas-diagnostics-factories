<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\SecurityAdvisory;
use Psr\Container\ContainerInterface;

final class SecurityAdvisoryPsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): SecurityAdvisory
    {
        $this->container = $container;
        $params          = $this->getParams();

        return new SecurityAdvisory(
            $this->getLockFilePath($params)
        );
    }

    private function getLockFilePath(array $params): ?string
    {
        return $params['lockFilePath'] ?? null;
    }
}
