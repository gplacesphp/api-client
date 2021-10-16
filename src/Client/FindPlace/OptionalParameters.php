<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\FindPlace;

final class OptionalParameters
{
    /** @var string|null */
    private $language;
    /** @var array */
    private $fields;

    private function __construct(?string $language = null, array $fields = [])
    {
        $this->language = $language;
        $this->fields = $fields;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['language'] ?? null,
            \array_map(
                function (string $field): string {
                    return $field;
                },
                $data['fields'] ?? []
            )
        );
    }

    /** @param string[] $fields */
    public static function fromArguments(?string $language = null, array $fields = []): self
    {
        return new self(
            $language,
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
                'fields' => \implode(',', $this->fields),
            ],
            function ($value): bool {
                return !empty($value);
            }
        );
    }
}
