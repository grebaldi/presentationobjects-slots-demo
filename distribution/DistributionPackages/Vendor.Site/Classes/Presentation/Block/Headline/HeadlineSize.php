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
final class HeadlineSize implements EnumInterface
{
    const SIZE_MEDIUM = 'medium';
    const SIZE_LARGE = 'large';
    const SIZE_XXL = 'xxl';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $string): self
    {
        if (!in_array($string, self::getValues())) {
            throw HeadlineSizeIsInvalid::becauseItMustBeOneOfTheDefinedConstants($string);
        }

        return new self($string);
    }

    public static function medium(): self
    {
        return new self(self::SIZE_MEDIUM);
    }

    public static function large(): self
    {
        return new self(self::SIZE_LARGE);
    }

    public static function xxl(): self
    {
        return new self(self::SIZE_XXL);
    }

    public function getIsMedium(): bool
    {
        return $this->value === self::SIZE_MEDIUM;
    }

    public function getIsLarge(): bool
    {
        return $this->value === self::SIZE_LARGE;
    }

    public function getIsXxl(): bool
    {
        return $this->value === self::SIZE_XXL;
    }

    /**
     * @return array|string[]
     */
    public static function getValues(): array
    {
        return [
            self::SIZE_MEDIUM,
            self::SIZE_LARGE,
            self::SIZE_XXL
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
