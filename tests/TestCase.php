<?php

namespace Gome\Tests;

include __DIR__.'/../vendor/autoload.php';

use Gome\Factory;
use Gome\Order\OrderRequest;

class TestCase
{
    public function test()
    {
        $config = [
            'host' => '172.22.0.4',
            'port' => 8088,
            'opts' => [],
            'channel' => [],
        ];

        $app = Factory::mengine($config);
        //print_r($app);
        //print_r($app->getConfig());
        //print_r($app->gome);
        //print_r($app->gome->doTest());

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
        var_dump($response->getMessage());
        var_dump($response->getCode());
    }
}

$tc = new TestCase();
$tc->test();
