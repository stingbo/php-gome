<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: order.proto

namespace Gome\Order;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *定义请求结构
 *
 * Generated from protobuf message <code>gome.order.OrderRequest</code>
 */
class OrderRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * 用户唯一标识
     *
     * Generated from protobuf field <code>string uuid = 1;</code>
     */
    protected $uuid = '';
    /**
     * 订单唯一标识
     *
     * Generated from protobuf field <code>string oid = 2;</code>
     */
    protected $oid = '';
    /**
     * 交易对
     *
     * Generated from protobuf field <code>string symbol = 3;</code>
     */
    protected $symbol = '';
    /**
     * 交易方向，buy/sell
     *
     * Generated from protobuf field <code>.gome.order.TransactionType transaction = 4;</code>
     */
    protected $transaction = 0;
    /**
     * 交易价格
     *
     * Generated from protobuf field <code>double price = 5;</code>
     */
    protected $price = 0.0;
    /**
     * 交易数量
     *
     * Generated from protobuf field <code>double volume = 6;</code>
     */
    protected $volume = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $uuid
     *           用户唯一标识
     *     @type string $oid
     *           订单唯一标识
     *     @type string $symbol
     *           交易对
     *     @type int $transaction
     *           交易方向，buy/sell
     *     @type float $price
     *           交易价格
     *     @type float $volume
     *           交易数量
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Order::initOnce();
        parent::__construct($data);
    }

    /**
     * 用户唯一标识
     *
     * Generated from protobuf field <code>string uuid = 1;</code>
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * 用户唯一标识
     *
     * Generated from protobuf field <code>string uuid = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setUuid($var)
    {
        GPBUtil::checkString($var, True);
        $this->uuid = $var;

        return $this;
    }

    /**
     * 订单唯一标识
     *
     * Generated from protobuf field <code>string oid = 2;</code>
     * @return string
     */
    public function getOid()
    {
        return $this->oid;
    }

    /**
     * 订单唯一标识
     *
     * Generated from protobuf field <code>string oid = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setOid($var)
    {
        GPBUtil::checkString($var, True);
        $this->oid = $var;

        return $this;
    }

    /**
     * 交易对
     *
     * Generated from protobuf field <code>string symbol = 3;</code>
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * 交易对
     *
     * Generated from protobuf field <code>string symbol = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setSymbol($var)
    {
        GPBUtil::checkString($var, True);
        $this->symbol = $var;

        return $this;
    }

    /**
     * 交易方向，buy/sell
     *
     * Generated from protobuf field <code>.gome.order.TransactionType transaction = 4;</code>
     * @return int
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * 交易方向，buy/sell
     *
     * Generated from protobuf field <code>.gome.order.TransactionType transaction = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setTransaction($var)
    {
        GPBUtil::checkEnum($var, \Gome\Order\TransactionType::class);
        $this->transaction = $var;

        return $this;
    }

    /**
     * 交易价格
     *
     * Generated from protobuf field <code>double price = 5;</code>
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * 交易价格
     *
     * Generated from protobuf field <code>double price = 5;</code>
     * @param float $var
     * @return $this
     */
    public function setPrice($var)
    {
        GPBUtil::checkDouble($var);
        $this->price = $var;

        return $this;
    }

    /**
     * 交易数量
     *
     * Generated from protobuf field <code>double volume = 6;</code>
     * @return float
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * 交易数量
     *
     * Generated from protobuf field <code>double volume = 6;</code>
     * @param float $var
     * @return $this
     */
    public function setVolume($var)
    {
        GPBUtil::checkDouble($var);
        $this->volume = $var;

        return $this;
    }

}

