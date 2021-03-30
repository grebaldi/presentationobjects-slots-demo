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
final class HeadlineType implements EnumInterface
{
    const TYPE_H1 = 'h1';
    const TYPE_H2 = 'h2';
    const TYPE_H3 = 'h3';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $string): self
    {
        if (!in_array($string, self::getValues())) {
            throw HeadlineTypeIsInvalid::becauseItMustBeOneOfTheDefinedConstants($string);
        }

        return new self($string);
    }

    public static function h1(): self
    {
        return new self(self::TYPE_H1);
    }

    public static function h2(): self
    {
        return new self(self::TYPE_H2);
    }

    public static function h3(): self
    {
        return new self(self::TYPE_H3);
    }

    public function getIsH1(): bool
    {
        return $this->value === self::TYPE_H1;
    }

    public function getIsH2(): bool
    {
        return $this->value === self::TYPE_H2;
    }

    public function getIsH3(): bool
    {
        return $this->value === self::TYPE_H3;
    }

    /**
     * @return array|string[]
     */
    public static function getValues(): array
    {
        return [
            self::TYPE_H1,
            self::TYPE_H2,
            self::TYPE_H3
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
