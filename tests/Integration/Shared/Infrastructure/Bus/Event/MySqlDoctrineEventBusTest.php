<?php

declare(strict_types=1);

namespace App\Tests\Integration\Shared\Infrastructure\Bus\Event;

use App\Tests\Shared\Domain\Mother\RideService\RideServiceMother;
use App\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Cal\RideServices\Domain\Event\RideServiceCreatedEvent;
use Cal\Shared\Infrastructure\Bus\Event\MySqlDoctrineEventBus;
use Doctrine\ORM\EntityManagerInterface;

class MySqlDoctrineEventBusTest extends InfrastructureTestCase
{
    private MySqlDoctrineEventBus $eventBus;
    private \Doctrine\DBAL\Connection $connection;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get(EntityManagerInterface::class);

        $this->connection = $entityManager->getConnection();
        $this->eventBus = new MySqlDoctrineEventBus($entityManager);
    }

    public function test_it_store_events_in_database(): void
    {
        $events = [
            new RideServiceCreatedEvent(RideServiceMother::random()),
        ];

        $this->eventBus->publish(...$events);

        $count = $this->connection
            ->executeQuery('select count(*) as total from events_log')
            ->fetchColumn(0);
        $this->assertEquals(1, $count);
    }
}
