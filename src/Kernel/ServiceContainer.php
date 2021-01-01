<?php

namespace Gome\Kernel;

use Gome\Kernel\Providers\ConfigServiceProvider;
use Pimple\Container;

/**
 * Class ServiceContainer.
 *
 * @property Config $config
 */
class ServiceContainer extends Container
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var array
     */
    protected $providers = [];

    /**
     * @var array
     */
    protected $defaultConfig = [];

    /**
     * @var array
     */
    protected $userConfig = [];

    /**
     * Constructor.
     * @param array $config
     * @param array $prepends
     * @param string|null $id
     */
    public function __construct(array $config = [], array $prepends = [], string $id = null)
    {
        $this->userConfig = $config;

        parent::__construct($prepends);

        $this->registerProviders($this->getProviders());

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id ?? $this->id = md5(json_encode($this->userConfig));
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get(string $id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed $value
     */
    public function __set(string $id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        $base = [
            'http' => [
                'timeout' => 30.0,
            ],
        ];

        return array_replace_recursive($base, $this->defaultConfig, $this->userConfig);
    }

    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders(): array
    {
        return array_merge([
            ConfigServiceProvider::class,
        ], $this->providers);
    }

    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }
}
