<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Mother\RideService;

use Cal\RideServices\Domain\Event\RideServiceCreatedEvent;
use Cal\RideServices\Domain\RideService;

class RideServiceCreatedEventMother
{
    public static function fromRideService(RideService $rideService): RideServiceCreatedEvent
    {
        return new RideServiceCreatedEvent(
            $rideService
        );
    }
}
