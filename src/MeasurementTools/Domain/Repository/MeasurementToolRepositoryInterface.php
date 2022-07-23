<?php

namespace App\MeasurementTools\Domain\Repository;

use App\MeasurementTools\Domain\Entity\MeasurementTool;

interface MeasurementToolRepositoryInterface
{
    public function add(MeasurementTool $measurementTool): void;
    public function findById(int $id): MeasurementTool;
}