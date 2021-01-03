<?php

namespace Gome\Mengine\Pool;

use Gome\Kernel\BaseClient;
use Gome\Pool\DepthClient;
use Gome\Pool\DepthRequest;
use Gome\Pool\DepthResponse;

class Client extends BaseClient
{
    /**
     * set grpc request client.
     *
     * @return DepthClient
     */
    public function getClient(): DepthClient
    {
        return new DepthClient($this->host.':'.$this->port, $this->opts, $this->channel);
    }

    /**
     * 处理返回结果.
     *
     * @param $response
     *
     * @return DepthResponse
     */
    public function getResponse($response): DepthResponse
    {
        list($response, $status) = $response;
        if (!$response) {
            $response = new DepthResponse();
            $response->setCode($status->code);
            $response->setMessage($status->details);
        }

        return $response;
    }

    /**
     * 下单.
     *
     * @param DepthRequest $request
     *
     * @return mixed
     */
    public function getDepth(DepthRequest $request): DepthResponse
    {
        $client = $this->getClient();
        $result = $client->getDepth($request)->wait();

        return $this->getResponse($result);
    }
}
