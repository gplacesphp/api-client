<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client\PlaceDetails\Reviews;

final class Review
{
    /** @var string */
    private $authorName;
    /** @var string */
    private $authorUrl;
    /** @var string */
    private $language;
    /** @var string */
    private $profilePhotoUrl;
    /** @var int */
    private $rating;
    /** @var string */
    private $relativeTimeDescription;
    /** @var string */
    private $text;
    /** @var int */
    private $time;

    private function __construct(
        string $authorName,
        string $authorUrl,
        string $language,
        string $profilePhotoUrl,
        int $rating,
        string $relativeTimeDescription,
        string $text,
        int $time
    ) {
        $this->authorName = $authorName;
        $this->authorUrl = $authorUrl;
        $this->language = $language;
        $this->profilePhotoUrl = $profilePhotoUrl;
        $this->rating = $rating;
        $this->relativeTimeDescription = $relativeTimeDescription;
        $this->text = $text;
        $this->time = $time;
    }

    public function authorName(): string
    {
        return $this->authorName;
    }

    public function authorUrl(): string
    {
        return $this->authorUrl;
    }

    public function language(): string
    {
        return $this->language;
    }

    public function profilePhotoUrl(): string
    {
        return $this->profilePhotoUrl;
    }

    public function rating(): int
    {
        return $this->rating;
    }

    public function relativeTimeDescription(): string
    {
        return $this->relativeTimeDescription;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function time(): int
    {
        return $this->time;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['author_name'] ?? '',
            $data['author_url'] ?? '',
            $data['language'] ?? '',
            $data['profile_photo_url'] ?? '',
            $data['rating'] ?? 0,
            $data['relative_time_description'] ?? '',
            $data['text'] ?? '',
            $data['time'] ?? 0
        );
    }

    public function toArray(): array
    {
        return [
            'author_name' => $this->authorName,
            'author_url' => $this->authorUrl,
            'language' => $this->language,
            'profile_photo_url' => $this->profilePhotoUrl,
            'rating' => $this->rating,
            'relative_time_description' => $this->relativeTimeDescription,
            'text' => $this->text,
            'time' => $this->time,
        ];
    }
}
