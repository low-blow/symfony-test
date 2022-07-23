<?php
declare(strict_types=1);

namespace App\MeasurementTools\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\SoftDeleteable;
use Gedmo\Mapping\Annotation\Timestampable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'measurement_tools')]
#[SoftDeleteable]
class MeasurementTool
{
    use SoftDeleteableEntity;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column]
    #[Timestampable(on: 'create')]
    private \DateTime $createdAt;

    #[ORM\Column]
    #[Timestampable(on: 'update')]
    private \DateTime $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}