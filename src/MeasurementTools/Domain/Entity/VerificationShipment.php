<?php
declare(strict_types=1);

namespace App\MeasurementTools\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'verification_shipments')]
class VerificationShipment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private \DateTime $shippingDate;

    #[ORM\Column]
    private \DateTime $returnDate;

    #[ORM\OneToOne(mappedBy: 'verificationShipment', targetEntity: 'VerificationRequest')]
    private VerificationRequest $verificationRequest;
}