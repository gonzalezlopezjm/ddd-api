<?php

declare(strict_types=1);

namespace Cal\RideServices\Domain\ValueObject;

use InvalidArgumentException;

class RideServiceLocation
{
    protected string $name;

    protected float $latitude;

    protected float $longitude;

    public function __construct(string $name, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'latitude' => $this->latitude(),
            'longitude' => $this->longitude(),
        ];
    }

    public static function fromArray(array $parameters): self
    {
        self::ensureHasEnoughData($parameters);

        return new self(
            (string) $parameters['name'],
            (float) $parameters['latitude'],
            (float) $parameters['longitude']
        );
    }

    protected static function ensureHasEnoughData(array $parameters): void
    {
        $requiredProperties = ['name', 'latitude', 'longitude'];
        foreach ($requiredProperties as $property) {
            if (! array_key_exists($property, $parameters)) {
                throw new InvalidArgumentException(sprintf('Location must contain "%s" field', $property));
            }
        }
    }
}
