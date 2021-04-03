<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Card;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObject;
use Sitegeist\Kaleidoscope\EelHelpers\ImageSourceHelperInterface;
use Vendor\Site\Presentation\Block\Headline\HeadlineInterface;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\SlotInterface;

/**
 * @Flow\Proxy(false)
 */
final class Card extends AbstractComponentPresentationObject implements CardInterface, SlotInterface
{
    private ?ImageSourceHelperInterface $image;

    private ?HeadlineInterface $headline;

    private ?SlotInterface $content;

    public function __construct(
        ?ImageSourceHelperInterface $image,
        ?HeadlineInterface $headline,
        ?SlotInterface $content
    ) {
        $this->image = $image;
        $this->headline = $headline;
        $this->content = $content;
    }

    public function getImage(): ?ImageSourceHelperInterface
    {
        return $this->image;
    }

    public function getHeadline(): ?HeadlineInterface
    {
        return $this->headline;
    }

    public function getContent(): ?SlotInterface
    {
        return $this->content;
    }

    public function getPrototypeName(): string
    {
        return 'Vendor.Site:Block.Card';
    }
}
