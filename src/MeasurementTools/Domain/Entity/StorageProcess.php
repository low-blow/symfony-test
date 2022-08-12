<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'storage_processes')]
class StorageProcess
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private \DateTime $startDate;

    #[ORM\Column]
    private \DateTime $endDate;

    #[ORM\Column]
    private string $cause;

    #[ORM\ManyToOne(targetEntity: 'MeasurementTool', inversedBy: 'storageProcesses')]
    #[ORM\JoinColumn(name: "measurement_tool_id", referencedColumnName: "id")]
    private MeasurementTool $measurementTool;
}