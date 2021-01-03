<?php

namespace Gome\Pool;

use Grpc\BaseStub;
use Grpc\UnaryCall;

class DepthClient extends BaseStub
{
    public function __construct($hostname, array $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    public function getDepth(DepthRequest $argument, $metadata = [], $options = []): UnaryCall
    {
        return $this->_simpleRequest(
            '/Pool/GetDepth',
            $argument,
            ['\Gome\Pool\DepthResponse', 'decode'],
            $metadata,
            $options
        );
    }
}
