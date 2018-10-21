<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient;

use GPlacesPhp\ApiClient\Client\FindPlace;
use GPlacesPhp\ApiClient\Client\FindPlace\OptionalParameters;
use GPlacesPhp\ApiClient\Client\PlaceDetails;

interface ClientInterface
{
    public const INPUT_TYPE_PHONE = 'phonenumber';
    public const INPUT_TYPE_TEXT = 'textquery';
    public const INPUT_TYPES = [self::INPUT_TYPE_TEXT, self::INPUT_TYPE_PHONE];

    public function placeDetails(string $placeId, PlaceDetails\OptionalParameters $parameters = null): PlaceDetails;

    public function findPlace(
        string $input,
        string $inputType = self::INPUT_TYPE_TEXT,
        OptionalParameters $optionalParameters = null
    ): FindPlace;
}
