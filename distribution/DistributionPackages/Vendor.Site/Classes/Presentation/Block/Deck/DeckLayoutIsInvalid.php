<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Deck;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Proxy(false)
 */
final class DeckLayoutIsInvalid extends \DomainException
{
    public static function becauseItMustBeOneOfTheDefinedConstants(string $attemptedValue): self
    {
        return new self('The given value "' . $attemptedValue . '" is no valid DeckLayout, must be one of the defined constants. ', 1617045546);
    }
}
