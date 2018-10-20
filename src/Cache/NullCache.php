<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Cache;

use Psr\SimpleCache\CacheInterface;

final class NullCache implements CacheInterface
{
    /** {@inheritdoc} */
    public function get($key, $default = null)
    {
    }

    /** {@inheritdoc} */
    public function set($key, $value, $ttl = null)
    {
    }

    /** {@inheritdoc} */
    public function delete($key)
    {
    }

    /** {@inheritdoc} */
    public function clear()
    {
    }

    /** {@inheritdoc} */
    public function getMultiple($keys, $default = null)
    {
    }

    /** {@inheritdoc} */
    public function setMultiple($values, $ttl = null)
    {
    }

    /** {@inheritdoc} */
    public function deleteMultiple($keys)
    {
    }

    /** {@inheritdoc} */
    public function has($key)
    {
        return false;
    }
}
