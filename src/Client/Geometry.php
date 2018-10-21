<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client;

use GPlacesPhp\ApiClient\Client\Geometry\Location;
use GPlacesPhp\ApiClient\Client\Geometry\Viewport;

final class Geometry
{
    /** @var Location */
    private $location;
    /** @var Viewport */
    private $viewport;

    private function __construct(Location $location, Viewport $viewport)
    {
        $this->location = $location;
        $this->viewport = $viewport;
    }

    public function location(): Location
    {
        return $this->location;
    }

    public function viewport(): Viewport
    {
        return $this->viewport;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            Location::fromArray($data['location'] ?? []),
            Viewport::fromArray($data['viewport'] ?? [])
        );
    }
}
