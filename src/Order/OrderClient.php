<?php

namespace Gome\Order;

use Grpc\BaseStub;
use Grpc\UnaryCall;

class OrderClient extends BaseStub
{
    public function __construct($hostname, array $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    public function doOrder(OrderRequest $argument, $metadata = [], $options = []): UnaryCall
    {
        return $this->_simpleRequest(
            '/Order/DoOrder',
            $argument,
            ['\Gome\Order\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }

    public function deleteOrder(OrderRequest $argument, $metadata = [], $options = []): UnaryCall
    {
        return $this->_simpleRequest(
            '/Order/DeleteOrder',
            $argument,
            ['\Gome\Order\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }
}
