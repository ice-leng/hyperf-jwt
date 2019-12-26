<?php

declare(strict_types=1);

namespace Lengbin\Hyperf\Jwt;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use Lengbin\Jwt\Jwt;

class JwtFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class);
        return make(Jwt::class, $config->get('jwt', []));
    }
}
