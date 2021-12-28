<?php

declare(strict_types=1);

namespace Cal\RideServices\Query\SearchByCriteria;

use Cal\RideServices\Query\RideServicesResponse;
use Cal\Shared\Domain\Bus\Query\QueryHandler;
use Cal\Shared\Domain\Criteria\Filters;
use Cal\Shared\Domain\Criteria\Order;

final class SearchByCriteriaQueryHandler implements QueryHandler
{
    private $searcher;

    public function __construct(SearchByCriteriaSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchByCriteriaQuery $query): RideServicesResponse
    {
        $filters = Filters::fromValues($query->filters());
        $order = Order::fromValues($query->orderBy(), $query->order());

        return $this->searcher->search($filters, $order, $query->limit(), $query->offset());
    }
}
