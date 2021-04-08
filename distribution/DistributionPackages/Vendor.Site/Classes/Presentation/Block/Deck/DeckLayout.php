<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Deck;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use PackageFactory\AtomicFusion\PresentationObjects\Domain\Enum\EnumInterface;

/**
 * @Flow\Proxy(false)
 */
final class DeckLayout implements EnumInterface
{
    const LAYOUT_STACK = 'stack';
    const LAYOUT_HALF = 'half';
    const LAYOUT_THIRD = 'third';
    const LAYOUT_TWOTHIRDS = 'twothirds';
    const LAYOUT_TRIPLETTS = 'tripletts';
    const LAYOUT_TILES = 'tiles';

    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $string): self
    {
        if (!in_array($string, self::getValues())) {
            throw DeckLayoutIsInvalid::becauseItMustBeOneOfTheDefinedConstants($string);
        }

        return new self($string);
    }

    public static function fromNumber(int $number): self
    {
        switch (true) {
            case $number <= 1:
                return self::stack();
            case $number <= 2:
                return self::half();
            case $number <= 3:
                return self::tripletts();
            default:
                return self::tiles();
        }
    }

    public static function stack(): self
    {
        return new self(self::LAYOUT_STACK);
    }

    public static function half(): self
    {
        return new self(self::LAYOUT_HALF);
    }

    public static function third(): self
    {
        return new self(self::LAYOUT_THIRD);
    }

    public static function twothirds(): self
    {
        return new self(self::LAYOUT_TWOTHIRDS);
    }

    public static function tripletts(): self
    {
        return new self(self::LAYOUT_TRIPLETTS);
    }

    public static function tiles(): self
    {
        return new self(self::LAYOUT_TILES);
    }

    public function getIsStack(): bool
    {
        return $this->value === self::LAYOUT_STACK;
    }

    public function getIsHalf(): bool
    {
        return $this->value === self::LAYOUT_HALF;
    }

    public function getIsThird(): bool
    {
        return $this->value === self::LAYOUT_THIRD;
    }

    public function getIsTwothirds(): bool
    {
        return $this->value === self::LAYOUT_TWOTHIRDS;
    }

    public function getIsTripletts(): bool
    {
        return $this->value === self::LAYOUT_TRIPLETTS;
    }

    public function getIsTiles(): bool
    {
        return $this->value === self::LAYOUT_TILES;
    }

    /**
     * @return array|string[]
     */
    public static function getValues(): array
    {
        return [
            self::LAYOUT_STACK,
            self::LAYOUT_HALF,
            self::LAYOUT_THIRD,
            self::LAYOUT_TWOTHIRDS,
            self::LAYOUT_TRIPLETTS,
            self::LAYOUT_TILES
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
