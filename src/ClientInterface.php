<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient;

use GPlacesPhp\ApiClient\Client\PlaceDetails;

interface ClientInterface
{
    public const INPUT_TYPE_PHONE = 'phonenumber';
    public const INPUT_TYPE_TEXT = 'textquery';
    public const INPUT_TYPES = [self::INPUT_TYPE_TEXT, self::INPUT_TYPE_PHONE];

    public function placeDetails(string $placeId, PlaceDetails\OptionalParameters $parameters = null): PlaceDetails;
}
