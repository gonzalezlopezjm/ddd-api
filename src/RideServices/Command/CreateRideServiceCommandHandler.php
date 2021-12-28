<?php

declare(strict_types=1);

namespace Cal\RideServices\Command;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Domain\ValueObject\RideServiceLocation;
use Cal\RideServices\Domain\ValueObject\RideServiceLocator;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\RideServices\Domain\ValueObject\RideServiceVehicleType;
use Cal\RideServices\Repository\RideServiceRepository;
use Cal\Shared\Domain\Bus\Command\CommandHandler;
use Cal\Shared\Domain\Bus\Event\EventBus;
use Cal\Shared\Domain\Utils;
use Cal\Shared\Domain\ValueObject\Uuid;

final class CreateRideServiceCommandHandler implements CommandHandler
{
    private RideServiceRepository $repository;
    private EventBus $eventBus;

    public function __construct(
        RideServiceRepository $repository,
        EventBus $eventBus
    ) {
        $this->repository = $repository;
        $this->eventBus = $eventBus;
    }

    public function __invoke(CreateRideServiceCommand $command): RideService
    {
        $rideService = RideService::create(
            new RideServiceUuid(Uuid::generate()),
            RideServiceLocation::fromArray($command->pickUp()),
            RideServiceLocation::fromArray($command->dropOff()),
            new RideServiceVehicleType($command->vehicleType() ?? RideServiceVehicleType::SEDAN),
            new RideServiceLocator(Utils::generateAlphanumericString(8))
        );

        $this->repository->save($rideService);

        $this->eventBus->publish(...$rideService->pullEvents());

        return $rideService;
    }
}
