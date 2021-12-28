<?php

declare(strict_types=1);

namespace Cal\RideServices\Query\SearchByCriteria;

use Cal\RideServices\Query\RideServicesResponse;
use Cal\RideServices\Repository\RideServiceRepository;
use Cal\Shared\Domain\Criteria\Criteria;
use Cal\Shared\Domain\Criteria\Filters;
use Cal\Shared\Domain\Criteria\Order;

final class SearchByCriteriaSearcher
{
    private $repository;

    public function __construct(RideServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function search(Filters $filters, Order $order, ?int $limit, ?int $offset): RideServicesResponse
    {
        $criteria = new Criteria($filters, $order, $offset, $limit);

        return new RideServicesResponse($this->repository->matching($criteria));
    }
}
