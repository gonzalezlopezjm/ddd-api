<?php

declare(strict_types=1);

namespace Cal\RideServices\Command;

use Cal\Shared\Domain\Bus\Command\Command;

final class UpdateRideServiceCommand implements Command
{
    private string $uuid;

    private ?array $pickUp;

    private ?array $dropOff;

    private ?string $vehicleType;

    public function __construct(
        string $uuid,
        array $pickUp = null,
        array $dropOff = null,
        string $vehicleType = null)
    {
        $this->uuid = $uuid;
        $this->pickUp = $pickUp;
        $this->dropOff = $dropOff;
        $this->vehicleType = $vehicleType;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function pickUp(): ?array
    {
        return $this->pickUp;
    }

    public function dropOff(): ?array
    {
        return $this->dropOff;
    }

    public function vehicleType(): ?string
    {
        return $this->vehicleType;
    }
}
