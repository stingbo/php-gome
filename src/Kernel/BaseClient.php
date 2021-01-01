<?php

namespace Gome\Kernel;

class BaseClient extends \Grpc\BaseStub
{
    /**
     * @var \Gome\Kernel\ServiceContainer
     */
    protected $app;
    /**
     * @var string
     */
    protected $host;
    /**
     * @var array
     */
    protected $opts = [];
    /**
     * @var string
     */
    protected $channel = null;

    /**
     * BaseClient constructor.
     *
     * @param \Gome\Kernel\ServiceContainer $app
     */
    public function __construct(ServiceContainer $app, $host = null, $port = null, $opts = null, $channel = null)
    {
        $this->app = $app;
        $this->host = $host ?? $app->config->host;
        $this->port = $port ?? $app->config->port;
        $this->opts = $opts ?? $app->config->opts;
        $this->channel = $channel ?? $app->config->channel;
    }
}
