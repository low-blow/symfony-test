<?php
declare(strict_types=1);

namespace App\MeasurementTools\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'verification_requests')]
class VerificationRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(targetEntity: 'VerificationOrder', inversedBy: 'verificationRequests')]
    private VerificationOrder $verificationOrder;

    #[ORM\OneToOne(inversedBy: 'verificationRequest', targetEntity: 'VerificationShipment')]
    #[ORM\JoinColumn(name: 'verification_shipment_id', referencedColumnName: 'id')]
    private VerificationShipment $verificationShipment;

    #[ORM\ManyToOne(targetEntity: 'VerificationCompanyAddress', inversedBy: 'verificationRequests')]
    #[ORM\JoinColumn(name: 'verification_company_address_id', referencedColumnName: 'id')]
    private VerificationCompanyAddress $verificationCompanyAddress;

    #[ORM\OneToOne(mappedBy: 'verificationRequest', targetEntity: 'Verification')]
    private Verification $verification;

    public function getVerificationCompanyAddress(): VerificationCompanyAddress
    {
        return $this->verificationCompanyAddress;
}
}