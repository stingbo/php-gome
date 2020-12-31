<?php

namespace StingBo\Gomengine;

class Gomengine
{
    public function __construct($uuid, $oid, $symbol, $transaction, $volume, $price)
    {
        $order_request = new \Gome\OrderRequest();
        $order_request->setUuid($uuid);
        $order_request->setOid($oid);
        $order_request->setSymbol($symbol);
        $order_request->setTransaction($transaction);
        $order_request->setPrice($price);
        $order_request->setVolume($volume);
    }

    public function DoOrder()
    {
        $order_match_client = new \Gome\OrderClient('172.19.0.4:8088', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        return $order_match_client->DoOrder($this->order_request)->wait();
    }

    public function DeleteOrder()
    {
        $order_match_client = new \Gome\OrderClient('172.19.0.4:8088', [
            'credentials' => \Grpc\ChannelCredentials::createInsecure(),
        ]);

        return $order_match_client->DeleteOrder($this->order_request)->wait();
    }
}
