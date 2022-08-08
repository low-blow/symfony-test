<?php
declare(strict_types=1);

namespace App\MeasurementTools\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'verification_company_addresses')]
class VerificationCompanyAddress
{
    public function __construct()
    {
        $this->verificationRequests = new ArrayCollection();
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\ManyToOne(targetEntity: 'VerificationCompany', inversedBy: 'verificationCompanyAddresses')]
    private VerificationCompany $verificationCompany;

    #[ORM\OneToOne(targetEntity: 'Address')]
    #[ORM\JoinColumn(name: 'address_id', referencedColumnName: 'id')]
    private Address $address;


    //One VerificationCompanyAddress has many VerificationRequests
    #[ORM\OneToMany(mappedBy: 'verificationCompanyAddress', targetEntity: 'VerificationRequest')]
    private ArrayCollection $verificationRequests;
}