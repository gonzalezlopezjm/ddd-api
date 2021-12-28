<?php

declare(strict_types=1);

namespace App\Controller\RideServices;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Query\RideServicesResponse;
use Cal\RideServices\Query\SearchByCriteria\SearchByCriteriaQuery;
use Cal\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RideServicesGetController
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(Request $request): Response
    {
        /** @var RideServicesResponse $response */
        $response = $this->queryBus->ask(new SearchByCriteriaQuery(
            $this->getRequestFilters($request),
            $this->getOrderByValue($request),
            $request->get('order', 'asc'),
            ((int) $request->query->get('limit')) ?: null,
            (int) $request->query->get('offset')
        ));

        return new JsonResponse(
            array_map(
                function (RideService $rideService) {
                    return $rideService->toArray();
                },
                $response->rideServices()
            ),
            Response::HTTP_OK,
            ['Access-Control-Allow-Origin' => '*']
        );
    }

    protected function getRequestFilters(Request $request): array
    {
        $filters = [];

        $filterProperties = [
            'vehicleType' => [
                'field' => 'vehicleType.value',
                'operator' => '=',
            ],
            'pickUp' => [
                'field' => 'pickUp.name',
                'operator' => 'CONTAINS',
            ],
            'dropOff' => [
                'field' => 'dropOff.name',
                'operator' => 'CONTAINS',
            ],
            'serviceLocator' => [
                'field' => 'serviceLocator.value',
                'operator' => '=',
            ],
        ];
        foreach ($filterProperties as $filterKey => $filterConfiguration) {
            $filterValue = $request->query->get($filterKey);
            if ($filterValue) {
                $filterConfiguration['value'] = $filterValue;
                $filters[] = $filterConfiguration;
            }
        }

        return $filters;
    }

    protected function getOrderByValue(Request $request): ?string
    {
        $orderBy = $request->query->get('orderBy');
        switch ($orderBy) {
            case 'uuid':
            case 'pickUp.name':
            case 'dropOff.name':
                return $orderBy;

            case 'pickUp':
                return 'pickUp.name';

            case 'dropOff':
                return 'dropOff.name';

            case 'vehicleType':
                return 'vehicleType.value';

            case 'serviceLocator':
                return 'serviceLocator.value';

            case 'createdAt':
                return 'createdAt.date';
        }

        return null;
    }
}
