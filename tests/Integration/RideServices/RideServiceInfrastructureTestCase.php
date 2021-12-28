<?php

declare(strict_types=1);

namespace App\Tests\Integration\RideServices;

use App\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Cal\RideServices\Infrastructure\Persistence\DoctrineRideServiceRepository;
use Cal\RideServices\Repository\RideServiceRepository;

class RideServiceInfrastructureTestCase extends InfrastructureTestCase
{
    protected RideServiceRepository $repository;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var DoctrineRideServiceRepository $repository */
        $repository = $this->get(RideServiceRepository::class);
        $this->repository = $repository;
    }
}
