<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\FixtureLoader;

final class FixtureLoader
{
    /** @var string */
    private $fixturesDir;

    /** @return array<mixed,mixed> */
    public function getJson(string $name): array
    {
        $fixturesDir = $this->fixturesDir();
        $fixtureFile = "{$fixturesDir}/{$name}.json";

        if (!\file_exists($fixtureFile)) {
            throw new \RuntimeException("Fixture file '{$fixtureFile}' not found.");
        }

        return \json_decode(\file_get_contents($fixtureFile) ?: '[]', true);
    }

    private function fixturesDir(): string
    {
        if (null === $this->fixturesDir) {
            $r = new \ReflectionObject($this);
            $dir = $rootDir = \dirname($r->getFileName() ?: '');
            while (!\file_exists($dir . '/fixtures')) {
                if ($dir === \dirname($dir)) {
                    return $this->fixturesDir = "{$rootDir}/fixtures";
                }
                $dir = \dirname($dir);
            }
            $this->fixturesDir = "{$dir}/fixtures";
        }

        return $this->fixturesDir;
    }
}
