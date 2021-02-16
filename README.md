## PHP 使用 protobuf 数据结构，调用 **[gome](https://github.com/stingbo/gome)** 撮合引擎服务
- 高性能撮合引擎微服务 **[gome](https://github.com/stingbo/gome)** PHP调用客户端

## 依赖

- `pecl install protobuf-{VERSION版本号}`

- `pecl install grpc`

## 基本使用

- `composer require sting_bo/php-gome`

- 下单与撤单，详见 test/TestCase.php
```php
$config = [
    'host' => '172.22.0.4', // gRPC 地址
    'port' => 8088, // gRPC 端口
    'opts' => [
        'credentials' => \Grpc\ChannelCredentials::createInsecure(),
    ],
    'channel' => [],
];

$app = Factory::mengine($config);
$response = $app->gome->doOrder(\Gome\Order\OrderRequest $request);
$response = $app->gome->deleteOrder(\Gome\Order\OrderRequest $request);
```

- 获取交易对深度，详见 test/TestCase.php
```php
$app = Factory::mengine($config);
$response = $app->pool->getDepth(\Gome\Pool\DepthRequest $request);
```

## 总结

- 生成 php 定义文件：`protoc --php_out=. *.proto`，项目里已生成，不用重复生成

- 有需求欢迎提 issue :)
