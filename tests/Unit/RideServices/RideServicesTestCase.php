<?php

declare(strict_types=1);

namespace App\Tests\Unit\RideServices;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Repository\RideServiceRepository;
use Cal\Shared\Domain\Bus\Event\Event;
use Cal\Shared\Domain\Bus\Event\EventBus;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class RideServicesTestCase extends TestCase
{
    /** @var MockObject */
    protected $repository;

    /** @var MockObject */
    protected $eventBus;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->createMock(RideServiceRepository::class);
        $this->eventBus = $this->createMock(EventBus::class);
    }

    public function repository(): RideServiceRepository
    {
        /** @var RideServiceRepository $repository */
        $repository = $this->repository;

        return $repository;
    }

    public function eventBus(): EventBus
    {
        /** @var EventBus $bus */
        $bus = $this->eventBus;

        return $bus;
    }

    protected function shouldSave(RideService $rideService): void
    {
        $this->repository
            ->expects($this->once())
            ->method('save')
            ->with($this->callback(function (RideService $a) use ($rideService) {
                return $this->areSimilar($a->toArray(), $rideService->toArray());
            }));
    }

    protected function shoudFind(RideService $rideService): void
    {
        $this->repository
            ->expects($this->any())
            ->method('find')
            ->willReturn($rideService);
    }

    protected function shouldPublishEvent(Event $event): void
    {
        $this->eventBus->method('publish')
            ->with($this->callback(function (Event $e) use ($event) {
                return $this->areSimilar($e->toPrimitives(), $event->toPrimitives());
            }));
    }

    protected function areSimilar(array $a, array $b): bool
    {
        return
            $a['pickUp']['name'] === $b['pickUp']['name'] &&
            $a['dropOff']['name'] === $b['dropOff']['name'] &&
            $a['vehicleType'] === $b['vehicleType'];
    }
}
