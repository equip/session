<?php

namespace Spark\Tools;

trait ArrayProxyTrait
{
    // SessionInterface
    abstract public function has($key);

    // SessionInterface
    abstract public function get($key, $default = null);

    // SessionInterface
    abstract public function set($key, $value);

    // SessionInterface
    abstract public function del($key);

    // ArrayAccess
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    // ArrayAccess
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    // ArrayAccess
    public function offsetSet($offset, $value)
    {
        return $this->set($offset, $value);
    }

    // ArrayAccess
    public function offsetUnset($offset)
    {
        return $this->del($offset);
    }
}
