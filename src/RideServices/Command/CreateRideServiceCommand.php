<?php

declare(strict_types=1);

namespace Cal\RideServices\Command;

use Cal\Shared\Domain\Bus\Command\Command;

final class CreateRideServiceCommand implements Command
{
    private array $pickUp;

    private array $dropOff;

    private ?string $vehicleType;

    public function __construct(array $pickUp, array $dropOff, string $vehicleType = null)
    {
        $this->pickUp = $pickUp;
        $this->dropOff = $dropOff;
        $this->vehicleType = $vehicleType;
    }

    public function pickUp(): array
    {
        return $this->pickUp;
    }

    public function dropOff(): array
    {
        return $this->dropOff;
    }

    public function vehicleType(): ?string
    {
        return $this->vehicleType;
    }
}
