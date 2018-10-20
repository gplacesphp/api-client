<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails\Geometry;

final class Viewport
{
    /** @var Location */
    private $northeast;
    /** @var Location */
    private $southwest;

    private function __construct(Location $northeast, Location $southwest)
    {
        $this->northeast = $northeast;
        $this->southwest = $southwest;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Location::fromArray($data['northeast'] ?? []),
            Location::fromArray($data['southwest'] ?? [])
        );
    }

    public function northeast(): Location
    {
        return $this->northeast;
    }

    public function southwest(): Location
    {
        return $this->southwest;
    }
}
