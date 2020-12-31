<?php

namespace StingBo\Gome;

class Gomengine
{
    private $gome_request;

    public function __construct($uuid, $oid, $symbol, $transaction, $volume, $price)
    {
        $this->gome_request = new \Gome\OrderRequest();
        $this->gome_request->setUuid($uuid);
        $this->gome_request->setOid($oid);
        $this->gome_request->setSymbol($symbol);
        $this->gome_request->setTransaction($transaction);
        $this->gome_request->setPrice($price);
        $this->gome_request->setVolume($volume);
    }

    public function DoOrder()
    {
        $order_match_client = new \Gome\GomeClient('172.19.0.4:8088', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        $request = $order_match_client->DoOrder($this->gome_request)->wait();
        list($response, $status) = $request;

        return $response;
    }

    public function DeleteOrder()
    {
        $order_match_client = new \Gome\GomeClient('172.19.0.4:8088', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        $request = $order_match_client->DeleteOrder($this->gome_request)->wait();
        list($response, $status) = $request;

        return $response;
    }
}
