<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Deck;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObject;
use Vendor\Site\Presentation\Block\Deck\DeckLayout;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\SlotInterface;

/**
 * @Flow\Proxy(false)
 */
final class Deck extends AbstractComponentPresentationObject implements DeckInterface
{
    private DeckLayout $layout;

    private SlotInterface $content;

    public function __construct(
        DeckLayout $layout,
        SlotInterface $content
    ) {
        $this->layout = $layout;
        $this->content = $content;
    }

    public function getLayout(): DeckLayout
    {
        return $this->layout;
    }

    public function getContent(): SlotInterface
    {
        return $this->content;
    }
}
