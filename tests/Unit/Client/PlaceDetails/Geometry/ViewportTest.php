<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\PlaceDetails\Geometry;

use GPlacesPhp\ApiClient\Client\PlaceDetails\Geometry\Viewport;
use PHPUnit\Framework\TestCase;

final class ViewportTest extends TestCase
{
    /** @test */
    public function viewport_can_be_created_from_array(): void
    {
        $viewport = Viewport::fromArray(
            [
                'northeast' => [
                    'lat' => 12.145151,
                    'lng' => 23.123412,
                ],
                'southwest' => [
                    'lat' => 34.522541,
                    'lng' => 45.803471,
                ],
            ]
        );

        $northEast = $viewport->northeast();
        $southWest = $viewport->southwest();

        $this->assertSame(12.145151, $northEast->latitude());
        $this->assertSame(23.123412, $northEast->longitude());
        $this->assertSame(34.522541, $southWest->latitude());
        $this->assertSame(45.803471, $southWest->longitude());
    }
}
