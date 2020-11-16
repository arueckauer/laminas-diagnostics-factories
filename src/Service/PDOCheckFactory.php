<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use Laminas\Diagnostics\Check\PDOCheck;
use Psr\Container\ContainerInterface;

final class PDOCheckFactory
{
    public function __invoke(ContainerInterface $container): PDOCheck
    {
        $params = $container->get('config')['system']['health-check']['params'][PDOCheck::class] ?? [];
        return new PDOCheck(
            $this->getDsn($params),
            $this->getUsername($params),
            $this->getPassword($params),
            $this->getTimeout($params),
        );
    }

    private function getDsn(array $params): string
    {
        return $params['dsn'];
    }

    private function getUsername(array $params): string
    {
        return $params['username'];
    }

    private function getPassword(array $params): string
    {
        return $params['password'];
    }

    private function getTimeout(array $params): int
    {
        return $params['timeout'] ?? 1;
    }
}
