<?php
declare(strict_types=1);

namespace App\MeasurementTools\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\SoftDeleteable;
use Gedmo\Mapping\Annotation\Timestampable;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\This;

#[ORM\Entity]
#[ORM\Table(name: 'measurement_tools')]
#[SoftDeleteable]
class MeasurementTool
{
    use SoftDeleteableEntity;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->verifications = new ArrayCollection();
        $this->isolationProcesses = new ArrayCollection();
        $this->storageProcesses = new ArrayCollection();
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

    #[ORM\OneToMany(mappedBy: 'measurementTool', targetEntity: 'Verification')]
    private ArrayCollection $verifications;

    #[ORM\OneToMany(mappedBy: 'measurementTool', targetEntity: 'IsolationProcess')]
    private ArrayCollection $isolationProcesses;

    #[ORM\OneToMany(mappedBy: 'measurementTool', targetEntity: 'StorageProcess')]
    private ArrayCollection $storageProcesses;

    public function isActive(): bool
    {
        return !($this->isIsolated() or $this->isInStorage());
    }

    public function isIsolated(): bool
    {
        return $this->isolationProcesses->exists(function ($elem) {
            return $elem->endDate >= new \DateTime();
        });
    }

    public function isInStorage(): bool
    {
        return $this->storageProcesses->exists(function ($elem) {
            return $elem->endDate >= new \DateTime();
        });
    }

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