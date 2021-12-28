<?php

declare(strict_types=1);

namespace Cal\RideServices\Query;

use Cal\RideServices\Domain\RideService;
use Cal\Shared\Domain\Bus\Query\Response;

class RideServiceResponse implements Response
{
    private $rideService;

    public function __construct(RideService $rideService)
    {
        $this->rideService = $rideService;
    }

    public function rideService(): RideService
    {
        return $this->rideService;
    }
}
