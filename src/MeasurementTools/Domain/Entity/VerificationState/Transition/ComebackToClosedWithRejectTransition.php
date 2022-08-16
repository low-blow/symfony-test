<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity\VerificationState\Transition;

use App\MeasurementTools\Domain\Entity\Verification;
use App\MeasurementTools\Domain\Entity\VerificationState\ClosedWithRejectVerificationState;

class ComebackToClosedWithRejectTransition
{
    public function __invoke(Verification $verification): Verification
    {
        $verification->setState(ClosedWithRejectVerificationState::class);

        return $verification;
    }
}