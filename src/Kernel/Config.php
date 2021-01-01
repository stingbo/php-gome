<?php

namespace Gome\Kernel;

use Gome\Kernel\Support\Collection;

class Config extends Collection
{
    /**
     * @var mixed
     */
    private $host;
    /**
     * @var mixed
     */
    private $port;
    /**
     * @var mixed
     */
    private $opts;
    /**
     * @var mixed
     */
    private $channel;
}
