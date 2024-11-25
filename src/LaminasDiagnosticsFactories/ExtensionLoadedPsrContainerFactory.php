<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\ExtensionLoaded;
use Psr\Container\ContainerInterface;

final class ExtensionLoadedPsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): ExtensionLoaded
    {
        $this->container = $container;
        $params          = $this->getParams();

        $check = new ExtensionLoaded(
            $this->getExtensionName($params),
        );
        $check->setLabel($this->getLabel($params));

        return $check;
    }

    private function getExtensionName(array $params): string|iterable
    {
        return $params['extensionName'];
    }
}
