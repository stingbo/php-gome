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
        \Gome\Mengine\ServiceProvider::class,
    ];
}
