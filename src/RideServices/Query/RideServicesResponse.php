<?php

declare(strict_types=1);

namespace Cal\RideServices\Query;

use Cal\Shared\Domain\Bus\Query\Response;

class RideServicesResponse implements Response
{
    private $rideServices;

    public function __construct(array $rideServices)
    {
        $this->rideServices = $rideServices;
    }

    public function rideServices(): array
    {
        return $this->rideServices;
    }
}
