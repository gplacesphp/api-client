<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\Geometry;

use GPlacesPhp\ApiClient\Client\Geometry\Viewport;
use GPlacesPhp\ApiClient\Tests\TestCase\Mother\LocationMother;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ViewportTest extends TestCase
{
    public function test_viewport_can_be_created_from_array(): void
    {
        $viewport = Viewport::fromArray(
            [
                'northeast' => LocationMother::withValues(12.145151, 23.123412)->toArray(),
                'southwest' => LocationMother::withValues(34.522541, 45.803471)->toArray(),
            ],
        );

        $northEast = $viewport->northeast();
        $southWest = $viewport->southwest();

        $this->assertSame(12.145151, $northEast->latitude());
        $this->assertSame(23.123412, $northEast->longitude());
        $this->assertSame(34.522541, $southWest->latitude());
        $this->assertSame(45.803471, $southWest->longitude());
    }
}
