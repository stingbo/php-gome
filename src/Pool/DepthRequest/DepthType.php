<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: pool.proto

namespace Gome\Pool\DepthRequest;

use UnexpectedValueException;

/**
 * Protobuf type <code>gome.pool.DepthRequest.DepthType</code>
 */
class DepthType
{
    /**
     * 只获取买方深度
     *
     * Generated from protobuf enum <code>BUY = 0;</code>
     */
    const BUY = 0;
    /**
     * 只获取卖方深度
     *
     * Generated from protobuf enum <code>SALE = 1;</code>
     */
    const SALE = 1;
    /**
     * 同时获取买卖的深度，待实现
     *
     * Generated from protobuf enum <code>DOUBLE_SIDE = 2;</code>
     */
    const DOUBLE_SIDE = 2;

    private static $valueToName = [
        self::BUY => 'BUY',
        self::SALE => 'SALE',
        self::DOUBLE_SIDE => 'DOUBLE_SIDE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DepthType::class, \Gome\Pool\DepthRequest_DepthType::class);
