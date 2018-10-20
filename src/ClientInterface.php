<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient;

use GPlacesPhp\ApiClient\Client\PlaceDetails;

interface ClientInterface
{
    public function placeDetails(string $placeId, PlaceDetails\OptionalParameters $parameters = null): PlaceDetails;
}
