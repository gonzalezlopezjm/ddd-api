<?php

declare(strict_types=1);

namespace Cal\RideServices\Query\SearchByCriteria;

use Cal\Shared\Domain\Bus\Query\Query;

class SearchByCriteriaQuery implements Query
{
    private $filters;
    private $orderBy;
    private $order;
    private $limit;
    private $offset;

    public function __construct(
        array $filters,
        string $orderBy = null,
        string $order = null,
        int $limit = null,
        int $offset = null
    ) {
        $this->filters = $filters;
        $this->orderBy = $orderBy;
        $this->order = $order;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function filters(): array
    {
        return $this->filters;
    }

    public function orderBy(): ?string
    {
        return $this->orderBy;
    }

    public function order(): ?string
    {
        return $this->order;
    }

    public function limit(): ?int
    {
        return $this->limit;
    }

    public function offset(): ?int
    {
        return $this->offset;
    }
}
