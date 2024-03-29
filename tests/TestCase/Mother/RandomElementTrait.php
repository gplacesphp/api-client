<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Mother;

trait RandomElementTrait
{
    /**
     * @param mixed[] $data
     *
     * @return mixed
     *
     * @throws \Exception on empty array passed
     */
    private static function randomElement(array $data)
    {
        $elementsCount = \count($data);

        if (0 === $elementsCount) {
            throw new \RuntimeException('Unable to pick random element empty array.');
        }

        $randomIndex = \random_int(0, $elementsCount - 1);

        return \array_values($data)[$randomIndex];
    }
}
