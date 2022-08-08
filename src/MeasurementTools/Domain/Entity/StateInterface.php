<?php

namespace App\MeasurementTools\Domain\Entity;

interface StateInterface
{
    public function proceedToNext(VerificationOrder $context);

    public function toString(): string;
}