<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain\Mother\RideService;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Domain\ValueObject\RideServiceCreatedAt;
use Cal\RideServices\Domain\ValueObject\RideServiceLocation;
use Cal\RideServices\Domain\ValueObject\RideServiceLocator;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\RideServices\Domain\ValueObject\RideServiceVehicleType;
use Cal\Shared\Domain\Utils;
use Faker\Factory;

final class RideServiceMother
{
    public static function with(array $params): RideService
    {
        $faker = Factory::create();

        return new RideService(
            isset($params['uuid']) ? new RideServiceUuid($params['uuid']) : new RideServiceUuid($faker->uuid),
            new RideServiceLocation(...array_values($params['pickUp'])),
            new RideServiceLocation(...array_values($params['dropOff'])),
            new RideServiceVehicleType($params['vehicleType']),
            new RideServiceLocator(Utils::generateAlphanumericString(8)),
            new RideServiceCreatedAt()
        );
    }

    public static function random(): RideService
    {
        $faker = Factory::create();

        return new RideService(
            new RideServiceUuid($faker->uuid),
            new RideServiceLocation($faker->name, $faker->latitude, $faker->longitude),
            new RideServiceLocation($faker->name, $faker->latitude, $faker->longitude),
            new RideServiceVehicleType($faker->randomElement([
                RideServiceVehicleType::SEDAN,
                RideServiceVehicleType::SUV,
                RideServiceVehicleType::VAN,
            ])),
            new RideServiceLocator(Utils::generateAlphanumericString(8)),
            new RideServiceCreatedAt()
        );
    }
}
