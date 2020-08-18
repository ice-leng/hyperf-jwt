<?php

declare(strict_types=1);

namespace Lengbin\Hyperf\Jwt;

use Hyperf\Contract\ConfigInterface;
use Lengbin\Jwt\Config;
use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;
use Lengbin\Jwt\Jwt;

class JwtFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        $cache = $container->get(CacheInterface::class);
        return make(Jwt::class, [$cache, new Config($config->get('jwt', []))]);
    }
}
