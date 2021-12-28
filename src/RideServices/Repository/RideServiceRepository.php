<?php

declare(strict_types=1);

namespace Cal\RideServices\Repository;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\Shared\Domain\Criteria\Criteria;

interface RideServiceRepository
{
    public function save(RideService $rideServide): void;

    public function find(RideServiceUuid $rideServiceUuid): ?RideService;

    public function matching(Criteria $criteria): array;
}
