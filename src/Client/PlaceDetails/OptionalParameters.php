<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails;

final class OptionalParameters
{
    /** @var string|null */
    private $language;
    /** @var string|null */
    private $region;
    /** @var string|null */
    private $sessionToken;
    /** @var array */
    private $fields;

    private function __construct(
        ?string $language = null,
        ?string $region = null,
        ?string $sessionToken = null,
        array $fields = []
    ) {
        $this->language = $language;
        $this->region = $region;
        $this->sessionToken = $sessionToken;
        $this->fields = $fields;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['language'] ?? null,
            $data['region'] ?? null,
            $data['sessiontoken'] ?? null,
            \array_map(
                function (string $field): string {
                    return $field;
                },
                $data['fields'] ?? []
            )
        );
    }

    /** @param string[] $fields */
    public static function fromArguments(
        ?string $language = null,
        ?string $region = null,
        ?string $sessionToken = null,
        array $fields = []
    ): self {
        return new self(
            $language,
            $region,
            $sessionToken,
            \array_map(
                function (string $field): string {
                    return $field;
                },
                $fields
            )
        );
    }

    public function toArray(): array
    {
        return \array_filter(
            [
                'language' => $this->language,
                'region' => $this->region,
                'sessiontoken' => $this->sessionToken,
                'fields' => \implode(',', $this->fields),
            ],
            function ($value): bool {
                return !empty($value);
            }
        );
    }
}
