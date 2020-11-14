<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\ExtensionLoaded;
use Psr\Container\ContainerInterface;
use Traversable;

class ExtensionLoadedFactory
{
    public function __invoke(ContainerInterface $container): ExtensionLoaded
    {
        $params = $container->get('config')['system']['health-check']['params'][ExtensionLoaded::class] ?? [];
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
