<?php

declare(strict_types=1);

namespace Cal\RideServices\Domain\Event;

use Cal\RideServices\Domain\RideService;
use Cal\Shared\Domain\Bus\Event\Event;

class RideServiceUpdatedEvent extends Event
{
    private RideService $rideService;

    public function __construct(
        RideService $rideService,
        string $eventId = null,
        string $createdAt = null
    ) {
        $this->rideService = $rideService;
        parent::__construct($rideService->uuid()->value(), $eventId, $createdAt);
    }

    public static function eventName(): string
    {
        return 'rideServices.domain.rideService.v1.update';
    }

    public function toPrimitives(): array
    {
        return $this->rideService->toArray();
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $createdAt
    ): Event {
        return new self(
            RideService::fromArray($body),
            $eventId,
            $createdAt
        );
    }
}
