<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails;

use GPlacesPhp\ApiClient\Client\PlaceDetails\AddressComponents\Component;

final class AddressComponents
{
    /** @var Component[] */
    private $components;

    private function __construct(Component ...$components)
    {
        $this->components = $components;
    }

    /** @param array<array{long_name: string, short_name: string, types: string[]}> $data */
    public static function fromArray(array $data): self
    {
        return new self(
            ...\array_map(
                function (array $componentData): Component {
                    return Component::fromArray($componentData);
                },
                $data
            )
        );
    }

    /** @return Component[] */
    public function components(): array
    {
        return $this->components;
    }

    /** @return array[] */
    public function toArray(): array
    {
        return \array_map(
            function (Component $component): array {
                return $component->toArray();
            },
            $this->components()
        );
    }
}
