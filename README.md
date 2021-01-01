## PHP 使用 protobuf 数据结构，调用 **[gome](https://github.com/stingbo/gome)** 撮合引擎服务
- 高性能撮合引擎微服务 **[gome](https://github.com/stingbo/gome)** PHP调用客户端

## 依赖

- `pecl install protobuf-{VERSION版本号}`

- `pecl install grpc`

## 基本使用

- `composer require sting_bo/php-gome`

```php
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
            'host' => '172.22.0.4', // gRPC 地址
            'port' => 8088, // gRPC 端口
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
```

## 总结

- 目前只有下单与撤单，获取深度等功能正在开发中 ...