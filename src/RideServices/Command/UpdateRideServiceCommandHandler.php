<?php

declare(strict_types=1);

namespace Cal\RideServices\Command;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Domain\ValueObject\RideServiceLocation;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\RideServices\Domain\ValueObject\RideServiceVehicleType;
use Cal\RideServices\Repository\RideServiceRepository;
use Cal\Shared\Domain\Bus\Command\CommandHandler;
use Cal\Shared\Domain\Bus\Event\EventBus;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class UpdateRideServiceCommandHandler implements CommandHandler
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

    public function __invoke(UpdateRideServiceCommand $command): RideService
    {
        $rideServiceUuid = new RideServiceUuid($command->uuid());
        $rideService = $this->repository->find($rideServiceUuid);

        if (! $rideService) {
            throw new NotFoundHttpException();
        }

        $rideService->update(
            $command->pickUp() ? RideServiceLocation::fromArray($command->pickUp()) : $rideService->pickUp(),
            $command->dropOff() ? RideServiceLocation::fromArray($command->dropOff()) : $rideService->dropOff(),
            $command->vehicleType() ? new RideServiceVehicleType($command->vehicleType()) : $rideService->vehicleType()
        );

        $this->repository->save($rideService);

        $this->eventBus->publish(...$rideService->pullEvents());

        return $rideService;
    }
}
