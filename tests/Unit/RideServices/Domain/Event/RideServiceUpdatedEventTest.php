<?php

declare(strict_types=1);

namespace App\Tests\Unit\RideServices\Domain\Event;

use App\Tests\Shared\Domain\Mother\RideService\RideServiceMother;
use App\Tests\Unit\RideServices\RideServicesTestCase;
use Cal\RideServices\Domain\Event\RideServiceCreatedEvent;
use Cal\RideServices\Domain\Event\RideServiceUpdatedEvent;
use Cal\RideServices\Domain\RideService;
use Cal\Shared\Domain\Utils;
use Carbon\Carbon;
use Faker\Factory;

class RideServiceUpdatedEventTest extends RideServicesTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Carbon::setTestNow();
    }

    public function test_event_name(): void
    {
        $event = $this->getEvent();

        $this->assertEquals('rideServices.domain.rideService.v1.update', $event->eventName());
    }

    public function test_it_returns_expected_primitive(): void
    {
        $rideService = RideServiceMother::random();
        $event = $this->getEvent($rideService);

        $this->assertEquals($rideService->toArray(), $event->toPrimitives());
    }

    public function test_it_is_created_as_expected_from_primitive(): void
    {
        $rideService = RideServiceMother::random();
        $event = $this->getEvent($rideService);
        $fromPrimitive = RideServiceCreatedEvent::fromPrimitives(
            $event->aggregateId(),
            $event->toPrimitives(),
            $event->eventId(),
            $event->occurredOn()
        );

        $this->assertEquals($fromPrimitive->toPrimitives(), $event->toPrimitives());
    }

    private function getEvent(RideService $rideService = null): RideServiceUpdatedEvent
    {
        $faker = Factory::create();

        return new RideServiceUpdatedEvent(
            $rideService ?? RideServiceMother::random(),
            $faker->uuid,
            Utils::dateToString(Carbon::now())
        );
    }
}
