<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client;

use GPlacesPhp\ApiClient\Client\PlaceDetails\AddressComponents;
use GPlacesPhp\ApiClient\Client\PlaceDetails\Reviews;

final class PlaceDetails
{
    /** @var AddressComponents */
    private $addressComponents;
    /** @var string */
    private $adrAddress;
    /** @var string */
    private $formattedAddress;
    /** @var string */
    private $formattedPhoneNumber;
    /** @var Geometry */
    private $geometry;
    /** @var string */
    private $icon;
    /** @var string */
    private $id;
    /** @var string */
    private $internationalPhoneNumber;
    /** @var string */
    private $name;
    /** @var string */
    private $placeId;
    /** @var float */
    private $rating;
    /** @var string */
    private $reference;
    /** @var Reviews */
    private $reviews;
    /** @var string */
    private $scope;
    /** @var string[] */
    private $types;
    /** @var string */
    private $url;
    /** @var int */
    private $utcOffset;
    /** @var string */
    private $vicinity;
    /** @var string */
    private $website;

    private function __construct(
        AddressComponents $addressComponents,
        string $adrAddress,
        string $formattedAddress,
        string $formattedPhoneNumber,
        Geometry $geometry,
        string $icon,
        string $id,
        string $internationalPhoneNumber,
        string $name,
        string $placeId,
        float $rating,
        string $reference,
        Reviews $reviews,
        string $scope,
        array $types,
        string $url,
        int $utcOffset,
        string $vicinity,
        string $website
    ) {
        $this->addressComponents = $addressComponents;
        $this->adrAddress = $adrAddress;
        $this->formattedAddress = $formattedAddress;
        $this->formattedPhoneNumber = $formattedPhoneNumber;
        $this->geometry = $geometry;
        $this->icon = $icon;
        $this->id = $id;
        $this->internationalPhoneNumber = $internationalPhoneNumber;
        $this->name = $name;
        $this->placeId = $placeId;
        $this->rating = $rating;
        $this->reference = $reference;
        $this->reviews = $reviews;
        $this->scope = $scope;
        $this->types = $types;
        $this->url = $url;
        $this->utcOffset = $utcOffset;
        $this->vicinity = $vicinity;
        $this->website = $website;
    }

    public function reviews(): Reviews
    {
        return $this->reviews;
    }

    public function scope(): string
    {
        return $this->scope;
    }

    /** @return string[] */
    public function types(): array
    {
        return $this->types;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function utcOffset(): int
    {
        return $this->utcOffset;
    }

    public function vicinity(): string
    {
        return $this->vicinity;
    }

    public function website(): string
    {
        return $this->website;
    }

    public function reference(): string
    {
        return $this->reference;
    }

    public function rating(): float
    {
        return $this->rating;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function placeId(): string
    {
        return $this->placeId;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function internationalPhoneNumber(): string
    {
        return $this->internationalPhoneNumber;
    }

    public function icon(): string
    {
        return $this->icon;
    }

    public function geometry(): Geometry
    {
        return $this->geometry;
    }

    public function formattedPhoneNumber(): string
    {
        return $this->formattedPhoneNumber;
    }

    public function formattedAddress(): string
    {
        return $this->formattedAddress;
    }

    public function adrAddress(): string
    {
        return $this->adrAddress;
    }

    public static function fromArray(array $data): self
    {
        $types = \array_map(
            function (string $type): string {
                return $type;
            },
            $data['types'] ?? []
        );

        return new self(
            AddressComponents::fromArray($data['address_components'] ?? []),
            $data['adr_address'] ?? '',
            $data['formatted_address'] ?? '',
            $data['formatted_phone_number'] ?? '',
            Geometry::fromArray($data['geometry'] ?? []),
            $data['icon'] ?? '',
            $data['id'] ?? '',
            $data['international_phone_number'] ?? '',
            $data['name'] ?? '',
            $data['place_id'] ?? '',
            $data['rating'] ?? 0.0,
            $data['reference'] ?? '',
            Reviews::fromArray($data['reviews'] ?? []),
            $data['scope'] ?? '',
            $types,
            $data['url'] ?? '',
            $data['utc_offset'] ?? 0,
            $data['vicinity'] ?? '',
            $data['website'] ?? ''
        );
    }

    public function addressComponents(): AddressComponents
    {
        return $this->addressComponents;
    }
}
