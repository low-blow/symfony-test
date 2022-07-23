<?php

namespace App\Tests\Functional\MeasurementTools\Infrastructure\Repository;

use App\MeasurementTools\Domain\Factory\MeasurementToolFactory;
use App\MeasurementTools\Infrastructure\Repository\MeasurementToolRepository;
use Faker\Factory;
use Faker\Generator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MeasurementToolRepositoryTest extends WebTestCase
{
    private MeasurementToolRepository $repository;
    private Generator $faker;
//    private MeasurementToolFactory $measurementToolFactory;

    public function setUp(): void
    {
        parent::setUp();
//        $this->measurementToolFactory = static::getContainer()->get(MeasurementToolFactory::class);
        $this->repository = static::getContainer()->get(MeasurementToolRepository::class);
        $this->faker = Factory::create();
    }

    public function test_measurement_tool_added_sussesfully() {
        $measurementTool = (new MeasurementToolFactory())->create($this->faker->word);

        // act
        $this->repository->add($measurementTool);

        // assert
        $existingMeasurementTool = $this->repository->findById($measurementTool->getId());
        $this->assertEquals($measurementTool->getId(), $existingMeasurementTool->getId());
    }
}