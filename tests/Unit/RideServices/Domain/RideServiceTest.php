<?php

declare(strict_types=1);

namespace App\Tests\Unit\RideService\Domain;

use App\Tests\Shared\Domain\Mother\RideService\RideServiceMother;
use App\Tests\Unit\RideServices\RideServicesTestCase;
use Cal\RideServices\Domain\RideService;

class RideServiceTest extends RideServicesTestCase
{
    public function test_it_is_created_from_an_array(): void
    {
        $rideService = RideServiceMother::random();
        $fromArray = RideService::fromArray($rideService->toArray());

        $this->assertTrue($this->areSimilar($rideService->toArray(), $fromArray->toArray()));
    }
}
