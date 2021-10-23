<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails;

use GPlacesPhp\ApiClient\Client\PlaceDetails\Reviews\Review;

final class Reviews
{
    /** @var Review[] */
    private $reviews;

    private function __construct(Review ...$reviews)
    {
        $this->reviews = $reviews;
    }

    /** @return Review[] */
    public function reviews(): array
    {
        return $this->reviews;
    }

    /** @param array<array{author_name: string, author_url: string, language: string, profile_photo_url: string, rating: int, relative_time_description: string, text: string, time: int}> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            ...\array_map(
                function (array $data): Review {
                    return Review::fromArray($data);
                },
                $data
            )
        );
    }
}
