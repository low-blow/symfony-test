<?php

namespace App\MeasurementTools\Domain\Entity\VerificationState;

use App\MeasurementTools\Domain\Entity\Verification;

abstract class VerificationState
{
    public function __construct(protected Verification $verification)
    {}

    //Check if measurement tool is in storage or in isolation
    public function isNeedToActive(): bool {
        return !$this->verification->getMeasurementTool()->isActive();
    }

    //Check if company address is specified
    public function isAddressSpecified(): bool {
        return $this->verification->isToBeSent();
    }
}

