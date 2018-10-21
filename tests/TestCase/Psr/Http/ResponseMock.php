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
    public function getProtocolVersion()
    {
    }

    /** {@inheritdoc} */
    public function withProtocolVersion($version)
    {
    }

    /** {@inheritdoc} */
    public function getHeaders()
    {
    }

    /** {@inheritdoc} */
    public function hasHeader($name)
    {
    }

    /** {@inheritdoc} */
    public function getHeader($name)
    {
    }

    /** {@inheritdoc} */
    public function getHeaderLine($name)
    {
    }

    /** {@inheritdoc} */
    public function withHeader($name, $value)
    {
    }

    /** {@inheritdoc} */
    public function withAddedHeader($name, $value)
    {
    }

    /** {@inheritdoc} */
    public function withoutHeader($name)
    {
    }

    /** {@inheritdoc} */
    public function getBody()
    {
        return $this->stream;
    }

    /** {@inheritdoc} */
    public function withBody(StreamInterface $body)
    {
    }

    /** {@inheritdoc} */
    public function getStatusCode()
    {
    }

    /** {@inheritdoc} */
    public function withStatus($code, $reasonPhrase = '')
    {
    }

    /** {@inheritdoc} */
    public function getReasonPhrase()
    {
    }
}
