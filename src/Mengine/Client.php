<?php

namespace Gome\Mengine;

use Gome\Kernel\BaseClient;
use Gome\Order\OrderClient;
use Gome\Order\OrderRequest;

class Client extends BaseClient
{
    public function doTest()
    {
        echo 'SUCCESS';

        return true;
    }

    /**
     * 下单.
     */
    public function doOrder(OrderRequest $order)
    {
        $client = new OrderClient($this->host.':'.$this->port, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        $request = $client->doOrder($order)->wait();
        list($response, $status) = $request;
        if (null === $status) {
            //TODO
        }

        return $response;
    }

    /**
     * 撤单.
     */
    public function deleteOrder($order)
    {
        $client = new OrderClient($this->host.':'.$this->port, [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        $request = $client->deleteOrder($order)->wait();
        list($response, $status) = $request;
        if (null === $status) {
            //TODO
        }

        return $response;
    }
}
