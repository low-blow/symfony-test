<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'addresses')]
class Address
{
    public function __construct(string $addressLine1, string $addressLine2, string $city, string $zipCode, string $country, string $province)
    {
        $this->addressLine1 = $addressLine1;
        $this->addressLine2 = $addressLine2;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->country = $country;
        $this->province = $province;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $addressLine1;

    #[ORM\Column(length: 255)]
    private string $addressLine2;

    #[ORM\Column(length: 50)]
    private string $city;

    #[ORM\Column(length: 50)]
    private string $zipCode;

    #[ORM\Column(length: 50)]
    private string $country;

    #[ORM\Column(length: 50)]
    private string $province;

}