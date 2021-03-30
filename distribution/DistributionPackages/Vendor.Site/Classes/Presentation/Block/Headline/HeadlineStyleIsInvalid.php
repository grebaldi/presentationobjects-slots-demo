<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Headline;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;

/**
 * @Flow\Proxy(false)
 */
final class HeadlineStyleIsInvalid extends \DomainException
{
    public static function becauseItMustBeOneOfTheDefinedConstants(string $attemptedValue): self
    {
        return new self('The given value "' . $attemptedValue . '" is no valid HeadlineStyle, must be one of the defined constants. ', 1617033730);
    }
}
