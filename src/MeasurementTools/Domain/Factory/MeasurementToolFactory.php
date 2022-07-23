<?php
declare(strict_types=1);

namespace App\MeasurementTools\Domain\Factory;

use App\MeasurementTools\Domain\Entity\MeasurementTool;

class MeasurementToolFactory
{
    public function create(string $name): MeasurementTool {
        return new MeasurementTool($name);
    }
}