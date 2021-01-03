<?php

namespace Gome\Mengine\Order;

use Gome\Kernel\BaseClient;
use Gome\Order\OrderClient;
use Gome\Order\OrderRequest;
use Gome\Order\OrderResponse;

class Client extends BaseClient
{
    /**
     * set grpc request client.
     *
     * @return OrderClient
     */
    public function getClient(): OrderClient
    {
        return new OrderClient($this->host.':'.$this->port, $this->opts, $this->channel);
    }

    /**
     * 处理返回结果.
     *
     * @param $response
     *
     * @return OrderResponse
     */
    public function getResponse($response): OrderResponse
    {
        list($response, $status) = $response;
        if (!$response) {
            $response = new OrderResponse();
            $response->setCode($status->code);
            $response->setMessage($status->details);
        }

        return $response;
    }

    /**
     * 下单.
     *
     * @param OrderRequest $order
     * @return mixed
     */
    public function doOrder(OrderRequest $order): OrderResponse
    {
        $client = $this->getClient();
        $result = $client->doOrder($order)->wait();

        return $this->getResponse($result);
    }

    /**
     * 撤单.
     *
     * @param $order
     * @return mixed
     */
    public function deleteOrder($order): OrderResponse
    {
        $client = $this->getClient();
        $result = $client->deleteOrder($order)->wait();

        return $this->getResponse($result);
    }
}
