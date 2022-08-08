<?php
declare(strict_types=1);


namespace App\MeasurementTools\Infrastructure\Repository;

use App\MeasurementTools\Domain\Entity\MeasurementTool;
use App\MeasurementTools\Domain\Repository\MeasurementToolRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MeasurementToolRepository extends ServiceEntityRepository implements MeasurementToolRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeasurementTool::class);
    }

    public function add(MeasurementTool $measurementTool): void
    {
        $this->_em->persist($measurementTool);
        $this->_em->flush();
    }

    public function findById(int $id): MeasurementTool
    {
        return $this->find($id);
    }

    public function remove(int $id): void
    {
        $this->_em->remove($this->findById($id));
        $this->_em->flush();
    }
}