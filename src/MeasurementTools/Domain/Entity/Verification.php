<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity;

use App\MeasurementTools\Domain\Entity\VerificationState\VerificationState;
use App\MeasurementTools\Domain\Factory\VerificationStateFactory;
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

    #[ORM\Column(length: 50)]
    private string $state;

    public function isToBeSent(): bool
    {
        return !is_null($this->verificationRequest->getVerificationCompanyAddress());
    }

    //need to implement status_id (как новый тип через DBAL\Type через паттерн "Состояние")
    public function getMeasurementTool(): MeasurementTool
    {
        return $this->measurementTool;
    }

    public function getState(): VerificationState
    {
        return new $this->state($this);
    }

    public function setState(string $stateClass): Void
    {
        $this->state = $stateClass;
    }

    public function getId(): int
    {
        return $this->id;
    }
}