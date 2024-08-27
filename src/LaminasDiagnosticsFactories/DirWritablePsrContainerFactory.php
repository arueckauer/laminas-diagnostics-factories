<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\DirWritable;
use Psr\Container\ContainerInterface;

final class DirWritablePsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): DirWritable
    {
        $this->container = $container;
        $params          = $this->getParams();

        $check = new DirWritable(
            $this->getPath($params),
        );
        $check->setLabel($this->getLabel($params));

        return $check;
    }

    private function getPath(array $params): ?string
    {
        return $params['path'] ?? null;
    }
}
