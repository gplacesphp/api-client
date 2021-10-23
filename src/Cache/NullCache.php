<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Cache;

use Psr\SimpleCache\CacheInterface;

final class NullCache implements CacheInterface
{
    /** {@inheritdoc} */
    public function get($key, $default = null)
    {
        return '';
    }

    /** {@inheritdoc} */
    public function set($key, $value, $ttl = null): bool
    {
        return true;
    }

    /** {@inheritdoc} */
    public function delete($key): bool
    {
        return true;
    }

    /** {@inheritdoc} */
    public function clear(): bool
    {
        return true;
    }

    /**
     * @param iterable<string> $keys
     *
     * @return iterable<string,mixed>
     */
    public function getMultiple($keys, $default = null): iterable
    {
        return ['a' => 0];
    }

    /** @param iterable<string,mixed> $values */
    public function setMultiple($values, $ttl = null): bool
    {
        return true;
    }

    /** @param iterable<string> $keys */
    public function deleteMultiple($keys): bool
    {
        return true;
    }

    /** {@inheritdoc} */
    public function has($key)
    {
        return false;
    }
}
