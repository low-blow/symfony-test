<?php
declare(strict_types=1);


namespace App\MeasurementTools\Domain\Entity\VerificationState\Transition\Exception;

use App\MeasurementTools\Domain\Entity\Verification;
use Throwable;

class InvalidTransitionException extends \Exception
{
    public function __construct(string $class, Verification $verification, int $code = 0, ?Throwable $previous = null)
    {
        $message = 'An error occurred while changing verification state. Transition type: '.$class.'. Verification id: '.$verification->getId();
        parent::__construct($message, $code, $previous);
    }

    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}