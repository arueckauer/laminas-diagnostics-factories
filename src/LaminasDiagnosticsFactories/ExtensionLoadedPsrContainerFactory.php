<?php

declare(strict_types=1);

namespace LaminasDiagnosticsFactories;

use Laminas\Diagnostics\Check\ExtensionLoaded;
use Override;
use Psr\Container\ContainerInterface;

final class ExtensionLoadedPsrContainerFactory extends AbstractPsrContainerFactory
{
    #[Override]
    public function __invoke(ContainerInterface $container): ExtensionLoaded
    {
        $params = $this->getParams($container);

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
