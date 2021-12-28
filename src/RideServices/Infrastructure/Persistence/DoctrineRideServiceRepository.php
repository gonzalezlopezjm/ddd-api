<?php

declare(strict_types=1);

namespace Cal\RideServices\Infrastructure\Persistence;

use Cal\RideServices\Domain\RideService;
use Cal\RideServices\Domain\ValueObject\RideServiceUuid;
use Cal\RideServices\Repository\RideServiceRepository;
use Cal\Shared\Domain\Criteria\Criteria;
use Cal\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use Cal\Shared\Infrastructure\Persistence\DoctrineRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @method RideService findOneBy(array $parameters, array $sortBy = null)
 */
class DoctrineRideServiceRepository extends DoctrineRepository implements RideServiceRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, RideService::class);
    }

    public function save(RideService $rideService): void
    {
        $this->persist($rideService);
    }

    public function matching(Criteria $criteria): array
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria);

        return $this->repository()->matching($doctrineCriteria)->toArray();
    }

    public function find(RideServiceUuid $rideServiceUuid): ?RideService
    {
        return $this->repository()->find($rideServiceUuid);
    }
}
