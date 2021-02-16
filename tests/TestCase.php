<?php

namespace Gome\Tests;

include __DIR__.'/../vendor/autoload.php';

use Gome\Factory;
use Gome\Order\OrderRequest;
use Gome\Pool\DepthRequest;
use Grpc\ChannelCredentials;

class TestCase
{
    public function doOrder()
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
        $transaction = 0; // 0-buy,1-sell
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

    public function getDepth()
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

        $symbol = 'btc2usdt';
        $transaction = 0; // 0-buy,1-sell
        $offset = 0;
        $count = 10;
        $request = new DepthRequest();
        $request->setSymbol($symbol);
        $request->setTransaction($transaction);
        $request->setOffset($offset);
        $request->setCount($count);

        $response = $app->pool->getDepth($request);
        echo 'code:'.$response->getCode();
        echo PHP_EOL;
        echo 'msg:'.$response->getMessage();
        echo PHP_EOL;
        echo 'total:'.$response->getTotal();
        echo PHP_EOL;
        var_dump($response->getData()->count());
        foreach ($response->getData() as $data) {
            print_r('价格:'.$data->getP());
            echo PHP_EOL;
            print_r('数量:'.$data->getV());
            echo PHP_EOL;
        }

        return 0;
    }
}

$tc = new TestCase();
//$tc->doOrder();
$tc->getDepth();
