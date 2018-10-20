<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails\AddressComponents;

final class Component
{
    /** @var string */
    private $longName;
    /** @var string */
    private $shortName;
    /** @var string[] */
    private $types;

    private function __construct(
        string $longName,
        string $shortName,
        string ...$types
    ) {
        $this->longName = $longName;
        $this->shortName = $shortName;
        $this->types = $types;
    }

    public function longName(): string
    {
        return $this->longName;
    }

    public function shortName(): string
    {
        return $this->shortName;
    }

    public function types(): array
    {
        return $this->types;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['long_name'] ?? '',
            $data['short_name'] ?? '',
            ...$data['types'] ?? []
        );
    }

    public function toArray(): array
    {
        return [
            'long_name' => $this->longName,
            'short_name' => $this->shortName,
            'types' => $this->types,
        ];
    }
}
