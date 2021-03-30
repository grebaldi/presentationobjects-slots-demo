<?php
namespace Vendor\Site\Presentation\Block\Card;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\ContentRepository\Domain\Projection\Content\TraversableNodeInterface;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObjectFactory;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\Editable;
use Sitegeist\Kaleidoscope\EelHelpers\AssetImageSourceHelper;
use Vendor\Site\Presentation\Block\Headline\HeadlineFactory;

final class CardFactory extends AbstractComponentPresentationObjectFactory
{
    /**
     * @Flow\Inject
     * @var HeadlineFactory
     */
    protected $headlineFactory;

    public function forCardNode(TraversableNodeInterface $node, bool $inBackend): CardInterface
    {
        return new Card(
            $node->getProperty('image')
                ? new AssetImageSourceHelper($node->getProperty('image'))
                : null,
            ($inBackend || $node->getProperty('headline'))
                ? $this->headlineFactory->forCardNode($node)
                : null,
            ($inBackend || $node->getProperty('content'))
                ? Editable::fromNodeProperty($node, 'content')
                : null
        );
    }
}
