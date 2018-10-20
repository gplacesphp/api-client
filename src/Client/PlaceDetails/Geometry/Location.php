<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails\Geometry;

final class Location
{
    /** @var float */
    private $latitude;
    /** @var float */
    private $longitude;

    private function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }

    public static function fromArray(array $data): self
    {
        return new self($data['lat'] ?? 0.0, $data['lng'] ?? 0.0);
    }

    public function toArray(): array
    {
        return [
            'lat' => $this->latitude,
            'lng' => $this->longitude,
        ];
    }
}
