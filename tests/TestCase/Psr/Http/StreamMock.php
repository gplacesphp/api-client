<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Psr\Http;

use Psr\Http\Message\StreamInterface;

final class StreamMock implements StreamInterface
{
    /** @var string */
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    /** {@inheritdoc} */
    public function __toString()
    {
        return $this->content;
    }

    /** {@inheritdoc} */
    public function close()
    {
    }

    /** {@inheritdoc} */
    public function detach()
    {
    }

    /** {@inheritdoc} */
    public function getSize()
    {
    }

    /** {@inheritdoc} */
    public function tell()
    {
    }

    /** {@inheritdoc} */
    public function eof()
    {
    }

    /** {@inheritdoc} */
    public function isSeekable()
    {
    }

    /** {@inheritdoc} */
    public function seek($offset, $whence = SEEK_SET)
    {
    }

    /** {@inheritdoc} */
    public function rewind()
    {
    }

    /** {@inheritdoc} */
    public function isWritable()
    {
    }

    /** {@inheritdoc} */
    public function write($string)
    {
    }

    /** {@inheritdoc} */
    public function isReadable()
    {
    }

    /** {@inheritdoc} */
    public function read($length)
    {
    }

    /** {@inheritdoc} */
    public function getContents()
    {
    }

    /** {@inheritdoc} */
    public function getMetadata($key = null)
    {
    }
}
