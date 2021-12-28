<?php

declare(strict_types=1);

namespace App\Tests\Integration\RideService\Infrastructure\Persistence;

use App\Tests\Integration\RideServices\RideServiceInfrastructureTestCase;
use App\Tests\Shared\Domain\Mother\RideService\RideServiceMother;

class DoctrineRideServiceRepositoryTest extends RideServiceInfrastructureTestCase
{
    public function test_save(): void
    {
        $rideService = RideServiceMother::random();
        $this->repository->save($rideService);
        $this->assertTrue(true);
    }
}
