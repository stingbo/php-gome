<?php

namespace Gome;

class GomeClient extends \Grpc\BaseStub
{
    public function __construct($hostname, array $opts, $channel = null)
    {
        parent::__construct($hostname, $opts, $channel);
    }

    public function DoOrder(\Gome\OrderRequest $argument, $metadata = [], $options = [])
    {
        return $this->_simpleRequest(
            '/api.Order/DoOrder',
            $argument,
            ['\Gome\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }

    public function DeleteOrder(\Gome\OrderRequest $argument, $metadata = [], $options = [])
    {
        return $this->_simpleRequest(
            '/api.Order/DeleteOrder',
            $argument,
            ['\Gome\OrderResponse', 'decode'],
            $metadata,
            $options
        );
    }
}
