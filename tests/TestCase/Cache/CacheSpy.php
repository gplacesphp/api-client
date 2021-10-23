<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Cache;

use Psr\SimpleCache\CacheInterface;

final class CacheSpy implements CacheInterface
{
    /** @var int */
    public $getCall = 0;
    /** @var array<mixed,mixed> */
    private $data;

    /** @param array<mixed,mixed> $data */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /** {@inheritdoc} */
    public function get($key, $default = null)
    {
        ++$this->getCall;

        return $this->data;
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
        return true;
    }
}
