<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\PlaceDetails;

use GPlacesPhp\ApiClient\Client\PlaceDetails\Reviews;
use GPlacesPhp\ApiClient\Client\PlaceDetails\Reviews\Review;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ReviewsTest extends TestCase
{
    public function test_reviews_can_be_created_from_array(): void
    {
        $review = Review::fromArray(
            [
                'author_name' => 'Robert Ardill',
                'author_url' => 'https://www.google.com/maps/contrib/106422854611155436041/reviews',
                'language' => 'en',
                'profile_photo_url' => 'https://lh3.googleusercontent.com/-T47KxWuAoJU/AAAAAAAAAAI/AAAAAAAAAZo/BDmyI12BZAs/s128-c0x00000000-cc-rp-mo-ba1/photo.jpg',
                'rating' => 5,
                'relative_time_description' => 'a month ago',
                'text' => 'Awesome offices. Great facilities, location and views. Staff are great hosts',
                'time' => 1491144016,
            ],
        );

        $reviews = Reviews::fromArray([$review->toArray()]);

        $this->assertEquals([$review], $reviews->reviews());
    }
}
