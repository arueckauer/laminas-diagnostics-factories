<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\ExtensionLoaded;
use Psr\Container\ContainerInterface;
use Traversable;

final class ExtensionLoadedPsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): ExtensionLoaded
    {
        $this->container = $container;
        $params          = $this->getParams();

        return new ExtensionLoaded(
            $this->getExtensionName($params),
        );
    }

    /**
     * @return string|array|Traversable
     */
    private function getExtensionName(array $params)
    {
        return $params['extensionName'];
    }
}
