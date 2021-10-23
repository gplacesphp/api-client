<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Psr\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

final class ResponseMock implements ResponseInterface
{
    /** @var StreamInterface */
    private $stream;

    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    public static function withContent(string $content): self
    {
        $stream = new StreamMock($content);

        return new self($stream);
    }

    /** {@inheritdoc} */
    public function getProtocolVersion(): string
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function withProtocolVersion($version): self
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getHeaders(): array
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function hasHeader($name): bool
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getHeader($name): array
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getHeaderLine($name): string
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function withHeader($name, $value): self
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function withAddedHeader($name, $value): self
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function withoutHeader($name): self
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getBody(): StreamInterface
    {
        return $this->stream;
    }

    /** {@inheritdoc} */
    public function withBody(StreamInterface $body): self
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getStatusCode(): int
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        throw new \RuntimeException('Not implemented');
    }

    /** {@inheritdoc} */
    public function getReasonPhrase(): string
    {
        throw new \RuntimeException('Not implemented');
    }
}
