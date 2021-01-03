<?php

namespace Gome\Mengine\Pool;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * {@inheritdoc}.
     */
    public function register(Container $pimple)
    {
        $pimple['pool'] = function ($app) {
            return new Client($app);
        };
    }
}
