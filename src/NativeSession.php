<?php

namespace Spark;

use Spark\Tools\ArrayProxyTrait;

class NativeSession implements SessionInterface
{
    use ArrayProxyTrait;

    /**
     * @inheritDoc
     */
    public function has($key)
    {
        return !empty($_SESSION[$key]);
    }

    /**
     * @inheritDoc
     */
    public function get($key, $default = null)
    {
        return $this->has($key) ? $_SESSION[$key] : $default;
    }

    /**
     * @inheritDoc
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @inheritDoc
     */
    public function del($key)
    {
        unset($_SESSION[$key]);
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        $_SESSION = [];
    }
}
