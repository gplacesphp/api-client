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
    public function close(): void
    {
    }

    /** {@inheritdoc} */
    public function detach(): void
    {
    }

    /** {@inheritdoc} */
    public function getSize(): void
    {
    }

    /** {@inheritdoc} */
    public function tell(): void
    {
    }

    /** {@inheritdoc} */
    public function eof(): void
    {
    }

    /** {@inheritdoc} */
    public function isSeekable(): void
    {
    }

    /** {@inheritdoc} */
    public function seek($offset, $whence = \SEEK_SET): void
    {
    }

    /** {@inheritdoc} */
    public function rewind(): void
    {
    }

    /** {@inheritdoc} */
    public function isWritable(): void
    {
    }

    /** {@inheritdoc} */
    public function write($string): void
    {
    }

    /** {@inheritdoc} */
    public function isReadable(): void
    {
    }

    /** {@inheritdoc} */
    public function read($length): void
    {
    }

    /** {@inheritdoc} */
    public function getContents(): void
    {
    }

    /** {@inheritdoc} */
    public function getMetadata($key = null): void
    {
    }
}
