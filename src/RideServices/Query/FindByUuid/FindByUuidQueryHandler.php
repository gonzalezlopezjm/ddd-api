<?php

declare(strict_types=1);

namespace Cal\RideServices\Query\FindByUuid;

use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\RideServices\Query\RideServiceResponse;
use Cal\RideServices\Repository\RideServiceRepository;
use Cal\Shared\Domain\Bus\Query\QueryHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FindByUuidQueryHandler implements QueryHandler
{
    private $repository;

    public function __construct(RideServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(FindByUuidQuery $query): RideServiceResponse
    {
        $rideService = $this->repository->find(new RideServiceUuid($query->uuid()));

        if (! $rideService) {
            throw new NotFoundHttpException();
        }

        return new RideServiceResponse($rideService);
    }
}
