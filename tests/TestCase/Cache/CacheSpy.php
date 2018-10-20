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
        return true;
    }
}
