<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity\VerificationState\Transition;

use App\MeasurementTools\Domain\Entity\Verification;
use App\MeasurementTools\Domain\Entity\VerificationState\ClosedVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\Transition\Exception\InvalidTransitionException;

class ProcessToClosedTransition
{
    /**
     * @throws InvalidTransitionException
     */
    public function __invoke(Verification $verification): Verification
    {
        // Check for verification has address.
        if($verification->getState()->isAddressSpecified())
        {
            throw new InvalidTransitionException(self::class, $verification);
        }
        
        $verification->setState(ClosedVerificationState::class);

        return $verification;
    }
}