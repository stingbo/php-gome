<?php

namespace Gome\Kernel;

use Grpc\BaseStub;

class BaseClient extends BaseStub
{
    /**
     * @var ServiceContainer
     */
    protected $app;
    /**
     * @var string
     */
    protected $host;
    /**
     * @var mixed
     */
    protected $port;
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
     * @param ServiceContainer $app
     * @param null $host
     * @param null $port
     * @param null $opts
     * @param null $channel
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
