<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Cache;

use Psr\SimpleCache\CacheInterface;

final class CacheSpy implements CacheInterface
{
    public $getCall = 0;
    /** @var array */
    private $data;

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
    public function set($key, $value, $ttl = null): void
    {
    }

    /** {@inheritdoc} */
    public function delete($key): void
    {
    }

    /** {@inheritdoc} */
    public function clear(): void
    {
    }

    /** {@inheritdoc} */
    public function getMultiple($keys, $default = null): void
    {
    }

    /** {@inheritdoc} */
    public function setMultiple($values, $ttl = null): void
    {
    }

    /** {@inheritdoc} */
    public function deleteMultiple($keys): void
    {
    }

    /** {@inheritdoc} */
    public function has($key)
    {
        return true;
    }
}
