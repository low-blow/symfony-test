<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation\Timestampable;

#[ORM\Entity]
#[ORM\Table(name: 'verification_orders')]
class VerificationOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    #[Timestampable(on: 'create')]
    private \DateTime $createdAt;

    #[ORM\OneToMany(mappedBy: 'verificationOrder', targetEntity: 'VerificationRequest')]
    private ArrayCollection $verificationRequests;
}