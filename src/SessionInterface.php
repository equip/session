<?php

namespace Spark;

interface SessionInterface extends
    \ArrayAccess
{
    /**
     * Check if the session contains a value
     *
     * @param string $key
     *
     * @return boolean
     */
    public function has($key);

    /**
     * Get a value from the session, or a default if it does not exist
     *
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Set a value in the session
     *
     * @param string $key
     * @param mixed $value
     *
     * @return mixed
     */
    public function set($key, $value);

    /**
     * Delete a value from the session
     *
     * @param string $key
     *
     * @return void
     */
    public function del($key);

    /**
     * Delete al values from the session
     *
     * @return void
     */
    public function clear();
}
