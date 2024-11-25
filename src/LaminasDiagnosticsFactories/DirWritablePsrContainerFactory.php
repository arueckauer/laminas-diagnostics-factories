<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\DirWritable;
use LaminasDiagnosticsFactories\Exception\InvalidConfiguration;
use Psr\Container\ContainerInterface;

use function sprintf;

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

    private function getPath(array $params): string|iterable
    {
        if (! isset($params['path'])) {
            throw new InvalidConfiguration(sprintf(
                'Missing "path" key in diagnostics config for %s (%s).',
                $this->checkName,
                DirWritable::class,
            ));
        }

        return $params['path'];
    }
}
