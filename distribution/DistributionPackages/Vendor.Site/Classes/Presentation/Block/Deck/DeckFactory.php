<?php
namespace Vendor\Site\Presentation\Block\Deck;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\ContentRepository\Domain\Projection\Content\TraversableNodeInterface;
use Neos\Media\Domain\Model\Image;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObjectFactory;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\Collection;
use Vendor\Site\Presentation\Block\Card\CardFactory;

final class DeckFactory extends AbstractComponentPresentationObjectFactory
{
    /**
     * @Flow\Inject
     * @var CardFactory
     */
    protected $cardFactory;

    public function forDeckNode(TraversableNodeInterface $node): DeckInterface
    {
        return new Deck(
            DeckLayout::fromString($node->getProperty('layout')),
            Collection::fromNodes($node->findChildNodes())
        );
    }

    public function forImageListNode(TraversableNodeInterface $node): DeckInterface
    {
        $images = $node->getProperty('images') ?? [];

        return new Deck(
            DeckLayout::fromNumber(count($images)),
            Collection::fromIterable($images, function (Image $image) {
                return $this->cardFactory->forImage($image);
            })
        );
    }
}
