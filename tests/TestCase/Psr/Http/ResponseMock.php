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
    public function getProtocolVersion(): void
    {
    }

    /** {@inheritdoc} */
    public function withProtocolVersion($version): void
    {
    }

    /** {@inheritdoc} */
    public function getHeaders(): void
    {
    }

    /** {@inheritdoc} */
    public function hasHeader($name): void
    {
    }

    /** {@inheritdoc} */
    public function getHeader($name): void
    {
    }

    /** {@inheritdoc} */
    public function getHeaderLine($name): void
    {
    }

    /** {@inheritdoc} */
    public function withHeader($name, $value): void
    {
    }

    /** {@inheritdoc} */
    public function withAddedHeader($name, $value): void
    {
    }

    /** {@inheritdoc} */
    public function withoutHeader($name): void
    {
    }

    /** {@inheritdoc} */
    public function getBody()
    {
        return $this->stream;
    }

    /** {@inheritdoc} */
    public function withBody(StreamInterface $body): void
    {
    }

    /** {@inheritdoc} */
    public function getStatusCode(): void
    {
    }

    /** {@inheritdoc} */
    public function withStatus($code, $reasonPhrase = ''): void
    {
    }

    /** {@inheritdoc} */
    public function getReasonPhrase(): void
    {
    }
}
