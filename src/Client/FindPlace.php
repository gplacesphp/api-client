<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client;

use GPlacesPhp\ApiClient\Client\FindPlace\Candidate;

final class FindPlace
{
    /** @var Candidate[] */
    private $candidates;

    private function __construct(Candidate ...$candidates)
    {
        $this->candidates = $candidates;
    }

    /** @return Candidate[] */
    public function candidates(): array
    {
        return $this->candidates;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            ...\array_map(
                function (array $candidateData): Candidate {
                    return Candidate::fromArray($candidateData);
                },
                $data ?? []
            )
        );
    }
}
