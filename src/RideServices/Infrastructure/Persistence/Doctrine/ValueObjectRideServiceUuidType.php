<?php

declare(strict_types=1);

namespace Cal\RideServices\Infrastructure\Persistence\Doctrine;

use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\Shared\Infrastructure\Persistence\Doctrine\UuidType;

class ValueObjectRideServiceUuidType extends UuidType
{
    protected function typeClassName(): string
    {
        return RideServiceUuid::class;
    }
}
