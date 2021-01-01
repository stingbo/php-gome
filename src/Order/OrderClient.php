<?php

namespace Gome\Order;

class OrderClient extends \Grpc\BaseStub
{
    public function __construct($hostname, array $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    public function doOrder(OrderRequest $argument, $metadata = [], $options = [])
    {
        return $this->_simpleRequest(
            '/api.Order/DoOrder',
            $argument,
            ['\Gome\Order\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }

    public function deleteOrder(OrderRequest $argument, $metadata = [], $options = [])
    {
        return $this->_simpleRequest(
            '/api.Order/DeleteOrder',
            $argument,
            ['\Gome\Order\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }
}
