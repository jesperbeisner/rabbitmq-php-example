<?php

declare(strict_types=1);

namespace Jesperbeisner\Producer;

use DateTimeImmutable;
use JsonSerializable;

final readonly class BookingMessage implements JsonSerializable
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private DateTimeImmutable $date,
    ) {
    }

    /**
     * @return array{firstName: string, lastName: string, date: string}
     */
    public function jsonSerialize(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'date' => $this->date->format('Y-m-d H:i:s'),
        ];
    }
}
