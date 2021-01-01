<?php

/*
 * This file is part of the sting_bo/php-gome.
 *
 * (c) sting bo <lianbo.wan@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Gome;

use Gome\Kernel\ServiceContainer;
use Gome\Mengine\Application;

/**
 * Class Factory.
 *
 * @method static Application gomengine(array $config)
 */
class Factory
{
    /**
     * @param string $name
     * @param array $config
     * @return ServiceContainer
     */
    public static function make(string $name, array $config): ServiceContainer
    {
        $namespace = Kernel\Support\Str::studly($name);
        $application = "\\Gome\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments): ServiceContainer
    {
        return self::make($name, ...$arguments);
    }
}
