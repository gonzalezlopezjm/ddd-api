<?php

declare(strict_types=1);

namespace App\Controller\RideServices;

use Cal\RideServices\Command\CreateRideServiceCommand;
use Cal\Shared\Domain\Bus\Command\CommandBus;
use Cal\Shared\Infrastructure\Http\ErrorResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RideServicesPostController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request): Response
    {
        try {
            $this->ensureHasEnoughRequestData(
                $request,
                ['pickUp', 'dropOff']
            );

            $this->commandBus->dispatch(new CreateRideServiceCommand(
                $request->get('pickUp'),
                $request->get('dropOff'),
                $request->get('vehicleType')
            ));

            return new Response(null, Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return new ErrorResponse($exception, Response::HTTP_BAD_REQUEST);
        }
    }

    public function ensureHasEnoughRequestData(Request $request, array $requiredProperties): void
    {
        foreach ($requiredProperties as $property) {
            $value = $request->get($property);
            if (! $value) {
                throw new \InvalidArgumentException(sprintf('Property "%s" is required', $property));
            }
        }
    }
}
