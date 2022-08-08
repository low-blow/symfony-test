<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'verifications')]
class Verification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(targetEntity: 'MeasurementTool', inversedBy: 'verifications')]
    #[ORM\JoinColumn(name: "measurement_tool_id", referencedColumnName: "id")]
    private MeasurementTool $measurementTool;

    #[ORM\Column]
    private \DateTime $verificationDate;

    #[ORM\Column]
    private \DateTime $validUntil;

    #[ORM\Column(length: 50)]
    private string $certificateCode;

    #[ORM\OneToOne(inversedBy: 'verification', targetEntity: 'VerificationRequest')]
    #[ORM\JoinColumn(name: 'verification_request_id', referencedColumnName: 'id')]
    private VerificationRequest $verificationRequest;

    //need to implement status_id (как новый тип через DBAL\Type через паттерн "Состояние")
}