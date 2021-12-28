<?php

declare(strict_types=1);

namespace Cal\RideServices\Domain\ValueObject;

use Cal\Shared\Domain\ValueObject\Enum;
use InvalidArgumentException;

final class RideServiceVehicleType extends Enum
{
    public const SEDAN = 'sedan';
    public const VAN = 'van';
    public const SUV = 'suv';

    protected function throwExceptionForInvalidValue($value): void
    {
        throw new InvalidArgumentException(sprintf('Vehicle type "%s" is not allowed', $value));
    }
}
