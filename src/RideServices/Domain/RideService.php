<?php

declare(strict_types=1);

namespace Cal\RideServices\Domain;

use Cal\RideServices\Domain\Event\RideServiceCreatedEvent;
use Cal\RideServices\Domain\Event\RideServiceUpdatedEvent;
use Cal\RideServices\Domain\ValueObject\RideServiceCreatedAt;
use Cal\RideServices\Domain\ValueObject\RideServiceLocation;
use Cal\RideServices\Domain\ValueObject\RideServiceLocator;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\RideServices\Domain\ValueObject\RideServiceVehicleType;
use Cal\Shared\Domain\Aggregate\AggregateRoot;
use Cal\Shared\Domain\Utils;

final class RideService extends AggregateRoot
{
    private RideServiceUuid $uuid;
    private RideServiceLocation $pickUp;
    private RideServiceLocation $dropOff;
    private RideServiceLocator $serviceLocator;
    private RideServiceVehicleType $vehicleType;
    private RideServiceCreatedAt $createdAt;

    public function __construct(
        RideServiceUuid $uuid,
        RideServiceLocation $pickUp,
        RideServiceLocation $dropOff,
        RideServiceVehicleType $vehicleType,
        RideServiceLocator $serviceLocator = null,
        RideServiceCreatedAt $createdAt = null
    ) {
        $this->uuid = $uuid;
        $this->pickUp = $pickUp;
        $this->dropOff = $dropOff;
        $this->vehicleType = $vehicleType;
        $this->serviceLocator = $serviceLocator;
        $this->createdAt = $createdAt ?? new RideServiceCreatedAt();
    }

    public static function create(
        RideServiceUuid $uuid,
        RideServiceLocation $pickUp,
        RideServiceLocation $dropOff,
        RideServiceVehicleType $vehicleType,
        RideServiceLocator $serviceLocator = null
    ): self {
        $rideService = new self(
            $uuid,
            $pickUp,
            $dropOff,
            $vehicleType,
            $serviceLocator,
            new RideServiceCreatedAt()
        );
        $rideService->record(new RideServiceCreatedEvent($rideService));

        return $rideService;
    }

    public function update(
        RideServiceLocation $pickUp,
        RideServiceLocation $dropOff,
        RideServiceVehicleType $vehicleType
    ): self {
        $this->pickUp = $pickUp;
        $this->dropOff = $dropOff;
        $this->vehicleType = $vehicleType;

        $this->record(new RideServiceUpdatedEvent($this));

        return $this;
    }

    public function uuid(): RideServiceUuid
    {
        return $this->uuid;
    }

    public function pickUp(): RideServiceLocation
    {
        return $this->pickUp;
    }

    public function dropOff(): RideServiceLocation
    {
        return $this->dropOff;
    }

    public function vehicleType(): RideServiceVehicleType
    {
        return $this->vehicleType;
    }

    public function serviceLocator(): RideServiceLocator
    {
        return $this->serviceLocator;
    }

    public function createdAt(): RideServiceCreatedAt
    {
        return $this->createdAt;
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid()->value(),
            'pickUp' => $this->pickUp()->toArray(),
            'dropOff' => $this->dropOff()->toArray(),
            'vehicleType' => $this->vehicleType()->value(),
            'serviceLocator' => $this->serviceLocator()->value(),
            'createdAt' => Utils::dateToString($this->createdAt()->date()),
        ];
    }

    public static function fromArray(array $parameters): self
    {
        return new self(
            new RideServiceUuid($parameters['uuid']),
            new RideServiceLocation(...array_values($parameters['pickUp'])),
            new RideServiceLocation(...array_values($parameters['dropOff'])),
            new RideServiceVehicleType($parameters['vehicleType']),
            new RideServiceLocator($parameters['serviceLocator']),
            new RideServiceCreatedAt(Utils::stringToDate($parameters['createdAt']))
        );
    }
}
