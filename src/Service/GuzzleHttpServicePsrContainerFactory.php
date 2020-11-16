<?php

declare(strict_types=1);

namespace arueckauer\LaminasDiagnosticsFactories\Service;

use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use Laminas\Diagnostics\Check\GuzzleHttpService;
use Psr\Container\ContainerInterface;

final class GuzzleHttpServicePsrContainerFactory extends AbstractPsrContainerFactory
{
    public function __invoke(ContainerInterface $container): GuzzleHttpService
    {
        $this->container = $container;
        $params          = $this->getParams();

        return new GuzzleHttpService(
            $this->getRequestOrUrl($params),
            $this->getHeaders($params),
            $this->getOptions($params),
            $this->getStatusCode($params),
            $this->getContent($params),
            $this->getGuzzle($params),
            $this->getMethod($params),
            $this->getBody($params)
        );
    }

    private function getRequestOrUrl(array $params): string
    {
        return $params['requestOrUrl'];
    }

    private function getHeaders(array $params): array
    {
        return $params['headers'] ?? [];
    }

    private function getOptions(array $params): array
    {
        return $params['options'] ?? [];
    }

    private function getStatusCode(array $params): int
    {
        return $params['statusCode'] ?? 200;
    }

    private function getContent(array $params): ?string
    {
        return $params['content'] ?? null;
    }

    private function getGuzzle(array $params): ?GuzzleClientInterface
    {
        return $params['guzzle'] ?? null;
    }

    private function getMethod(array $params): string
    {
        return $params['method'] ?? 'GET';
    }

    /**
     * @return mixed|null
     */
    private function getBody(array $params)
    {
        return $params['body'] ?? null;
    }
}
