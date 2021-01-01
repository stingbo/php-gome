<?php

namespace Gome\Tests;

include __DIR__.'/../vendor/autoload.php';

use Gome\Factory;
use Gome\Order\OrderRequest;
use Grpc\ChannelCredentials;

class TestCase
{
    public function test()
    {
        $config = [
            'host' => '172.22.0.4',
            'port' => 8088,
            'opts' => [
                'credentials' => ChannelCredentials::createInsecure(),
            ],
            'channel' => [],
        ];

        $app = Factory::mengine($config);

        $uuid = 1;
        $oid = 2;
        $symbol = 'btc2usdt';
        $transaction = 0; // 0-buy,1-sale
        $price = 1.2;
        $volume = 0.2;
        $request = new OrderRequest();
        $request->setUuid($uuid);
        $request->setOid($oid);
        $request->setSymbol($symbol);
        $request->setTransaction($transaction);
        $request->setPrice($price);
        $request->setVolume($volume);

        $response = $app->gome->doOrder($request);
        //$response = $app->gome->deleteOrder($request);
        echo 'code:'.$response->getCode();
        echo PHP_EOL;
        echo 'msg:'.$response->getMessage();

        return 0;
    }
}

$tc = new TestCase();
$tc->test();
