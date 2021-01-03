<?php

namespace Gome\Mengine;

use Gome\Kernel\ServiceContainer;

/**
 * Class Application.
 */
class Application extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Order\ServiceProvider::class,
        Pool\ServiceProvider::class,
    ];
}
