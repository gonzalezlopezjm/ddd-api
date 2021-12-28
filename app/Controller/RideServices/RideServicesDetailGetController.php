<?php

declare(strict_types=1);

namespace App\Controller\RideServices;

use Cal\RideServices\Query\FindByUuid\FindByUuidQuery;
use Cal\RideServices\Query\RideServiceResponse;
use Cal\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RideServicesDetailGetController
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(string $uuid, Request $request): Response
    {
        try {
            /** @var RideServiceResponse $response */
            $response = $this->queryBus->ask(new FindByUuidQuery($uuid));

            return new JsonResponse(
                $response->rideService()->toArray(),
                Response::HTTP_OK,
                ['Access-Control-Allow-Origin' => '*']
            );
        } catch (\Exception $exception) {
            return new Response(null, Response::HTTP_NOT_FOUND);
        }
    }
}
