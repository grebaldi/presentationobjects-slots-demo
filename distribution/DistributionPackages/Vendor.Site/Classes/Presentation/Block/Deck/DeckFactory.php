<?php
namespace Vendor\Site\Presentation\Block\Deck;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\ContentRepository\Domain\Projection\Content\TraversableNodeInterface;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObjectFactory;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\Collection;

final class DeckFactory extends AbstractComponentPresentationObjectFactory
{
    public function forDeckNode(TraversableNodeInterface $node): DeckInterface
    {
        return new Deck(
            DeckLayout::fromString($node->getProperty('layout')),
            Collection::fromNodes($node->findChildNodes())
        );
    }

    public function forAssets(array $assets): DeckInterface
    {
        return new Deck(
            DeckLayout::stack(),
            Collection::fromIterable($assets, function (AssetInterface $asset) {
                return $this->cardFactory->fromAsset($asset);
            })
        );
    }
}
