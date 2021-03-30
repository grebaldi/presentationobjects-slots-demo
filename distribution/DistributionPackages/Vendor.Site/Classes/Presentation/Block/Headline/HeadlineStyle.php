<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Headline;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use PackageFactory\AtomicFusion\PresentationObjects\Domain\Enum\EnumInterface;

/**
 * @Flow\Proxy(false)
 */
final class HeadlineStyle implements EnumInterface
{
    const STYLE_REGULAR = 'regular';
    const STYLE_DECORATIVE = 'decorative';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $string): self
    {
        if (!in_array($string, self::getValues())) {
            throw HeadlineStyleIsInvalid::becauseItMustBeOneOfTheDefinedConstants($string);
        }

        return new self($string);
    }

    public static function regular(): self
    {
        return new self(self::STYLE_REGULAR);
    }

    public static function decorative(): self
    {
        return new self(self::STYLE_DECORATIVE);
    }

    public function getIsRegular(): bool
    {
        return $this->value === self::STYLE_REGULAR;
    }

    public function getIsDecorative(): bool
    {
        return $this->value === self::STYLE_DECORATIVE;
    }

    /**
     * @return array|string[]
     */
    public static function getValues(): array
    {
        return [
            self::STYLE_REGULAR,
            self::STYLE_DECORATIVE
        ];
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
