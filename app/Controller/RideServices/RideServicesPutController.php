<?php

declare(strict_types=1);

namespace App\Controller\RideServices;

use Cal\RideServices\Command\UpdateRideServiceCommand;
use Cal\Shared\Domain\Bus\Command\CommandBus;
use Cal\Shared\Infrastructure\Http\ErrorResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RideServicesPutController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(string $uuid, Request $request): Response
    {
        try {
            $this->commandBus->dispatch(new UpdateRideServiceCommand(
                $uuid,
                $request->get('pickUp'),
                $request->get('dropOff'),
                $request->get('vehicleType')
            ));

            return new Response(null, Response::HTTP_OK);
        } catch (NotFoundHttpException $exception) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            return new ErrorResponse($exception, Response::HTTP_BAD_REQUEST);
        }
    }
}
