<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Factory;

use App\MeasurementTools\Domain\Entity\Verification;
use App\MeasurementTools\Domain\Entity\VerificationState\ClosedVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\ClosedWithRejectVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\ComebackVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\DraftVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\PendingVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\ProcessVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\RejectVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\VerificationState;
use http\Exception\InvalidArgumentException;

class VerificationStateFactory
{
    public function create(string $name, Verification $verification): VerificationState
    {
        switch ($name) {
            case "draft":
                return new DraftVerificationState($verification);
            case "pending":
                return new PendingVerificationState($verification);
            case "process":
                return new ProcessVerificationState($verification);
            case "comeback":
                return new ComebackVerificationState($verification);
            case "reject":
                return new RejectVerificationState($verification);
            case "closed-with-reject":
                return new ClosedWithRejectVerificationState($verification);
            case "closed":
                return new ClosedVerificationState($verification);
        }
        Throw new InvalidArgumentException('Unknown verification state: '.$name);
    }
}