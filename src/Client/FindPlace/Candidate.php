<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\FindPlace;

use GPlacesPhp\ApiClient\Client\Geometry;

final class Candidate
{
    /** @var string */
    private $formattedAddress;
    /** @var Geometry */
    private $geometry;
    /** @var string */
    private $name;
    /** @var string */
    private $placeId;
    /** @var string */
    private $id;

    private function __construct(
        string $formattedAddress,
        Geometry $geometry,
        string $name,
        string $placeId,
        string $id
    ) {
        $this->formattedAddress = $formattedAddress;
        $this->geometry = $geometry;
        $this->name = $name;
        $this->placeId = $placeId;
        $this->id = $id;
    }

    public function placeId(): string
    {
        return $this->placeId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function geometry(): Geometry
    {
        return $this->geometry;
    }

    public function name(): string
    {
        return $this->name;
    }

    /** @param array<string,string|array> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['formatted_address'] ?? '',
            Geometry::fromArray($data['geometry'] ?? []),
            $data['name'] ?? '',
            $data['place_id'] ?? '',
            $data['id'] ?? ''
        );
    }

    public function formattedAddress(): string
    {
        return $this->formattedAddress;
    }
}
