<?php

declare(strict_types=1);

namespace Cal\RideServices\Domain\ValueObject;

use Cal\Shared\Domain\ValueObject\StringValueObject;

class RideServiceLocator extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->value = $value;
    }
}
