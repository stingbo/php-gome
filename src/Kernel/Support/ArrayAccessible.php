<?php

namespace Gome\Kernel\Support;

use ArrayAccess;
use ArrayIterator;
use Gome\Kernel\Contracts\Arrayable;
use IteratorAggregate;

/**
 * Class ArrayAccessible.
 *
 * @author overtrue <i@overtrue.me>
 */
class ArrayAccessible implements ArrayAccess, IteratorAggregate, Arrayable
{
    private $array;

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->array);
    }

    public function offsetGet($offset)
    {
        return $this->array[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            $this->array[] = $value;
        } else {
            $this->array[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->array[$offset]);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->array);
    }

    public function toArray()
    {
        return $this->array;
    }
}
