<?php

declare(strict_types=1);

namespace Cal\RideServices\Query\FindByUuid;

use Cal\Shared\Domain\Bus\Query\Query;

class FindByUuidQuery implements Query
{
    private $uuid;

    public function __construct(
        string $uuid
    ) {
        $this->uuid = $uuid;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }
}
