<?php

declare(strict_types=1);

namespace App\Tests\Unit\RideServices\Command;

use App\Tests\Shared\Domain\Mother\RideService\RideServiceCreatedEventMother;
use App\Tests\Shared\Domain\Mother\RideService\RideServiceMother;
use App\Tests\Unit\RideServices\RideServicesTestCase;
use Cal\RideServices\Command\UpdateRideServiceCommand;
use Cal\RideServices\Command\UpdateRideServiceCommandHandler;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;

class UpdateRideServiceCommandHandlerTest extends RideServicesTestCase
{
    private UpdateRideServiceCommandHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new UpdateRideServiceCommandHandler(
            $this->repository(),
            $this->eventBus()
        );
    }

    public function test_it_update_a_ride_service(): void
    {
        $uuid = 'bab70862-dcfe-47e1-aa80-ddcdb91f0f66';
        $pickUp = [
            'name' => 'Universal Studios Hollywood',
            'latitude' => 34.137024551098,
            'longitude' => -118.35278348414,
        ];
        $dropOff = [
            'name' => 'Old Los Angeles Zoo',
            'latitude' => 34.133832514171,
            'longitude' => -118.28887329413,
        ];
        $vehicleType = 'van';

        $rideService = RideServiceMother::with([
            'uuid' => $uuid,
            'pickUp' => $pickUp,
            'dropOff' => $dropOff,
            'vehicleType' => $vehicleType,
        ]);
        $event = RideServiceCreatedEventMother::fromRideService($rideService);

        $this->shouldSave($rideService);
        $this->shouldPublishEvent($event);
        $this->shoudFind($rideService);

        $rideService = $this->repository()->find(new RideServiceUuid('bab70862-dcfe-47e1-aa80-ddcdb91f0f66'));

        $vehicleType = 'sedan';

        ($this->handler)(new UpdateRideServiceCommand($uuid, $pickUp, $dropOff, $vehicleType));
    }
}
