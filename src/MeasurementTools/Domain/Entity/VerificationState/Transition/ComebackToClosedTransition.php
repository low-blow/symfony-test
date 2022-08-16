<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity\VerificationState\Transition;

use App\MeasurementTools\Domain\Entity\Verification;
use App\MeasurementTools\Domain\Entity\VerificationState\ClosedVerificationState;

class ComebackToClosedTransition
{
    public function __invoke(Verification $verification): Verification
    {
        $verification->setState(ClosedVerificationState::class);

        return $verification;
    }
}