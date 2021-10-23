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
    public function __toString(): string
    {
        return $this->content;
    }

    /** {@inheritdoc} */
    public function close(): void
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function detach()
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getSize(): ?int
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function tell(): int
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function eof(): bool
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function isSeekable(): bool
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function seek($offset, $whence = \SEEK_SET): void
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function rewind(): void
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function isWritable(): bool
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function write($string): int
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function isReadable(): bool
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function read($length): string
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getContents(): string
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getMetadata($key = null): void
    {
        throw new \RuntimeException('Not implemented');
    }
}
