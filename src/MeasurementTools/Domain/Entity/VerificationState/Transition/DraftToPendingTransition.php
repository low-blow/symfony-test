<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity\VerificationState\Transition;

use App\MeasurementTools\Domain\Entity\Verification;
use App\MeasurementTools\Domain\Entity\VerificationState\PendingVerificationState;
use App\MeasurementTools\Domain\Entity\VerificationState\Transition\Exception\InvalidTransitionException;

class DraftToPendingTransition
{
    /**
     * @throws InvalidTransitionException
     */
    public function __invoke(Verification $verification): Verification
    {
        // Check for measurement tool is not in isolation and storage, check for verification contain fulfilled address.
        if($verification->getState()->isNeedToActive() or !$verification->getState()->isAddressSpecified())
        {
            throw new InvalidTransitionException(self::class, $verification);
        }

        $verification->setState(PendingVerificationState::class);

        return $verification;
    }
}