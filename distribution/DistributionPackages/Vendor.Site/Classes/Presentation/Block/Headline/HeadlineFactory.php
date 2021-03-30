<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Headline;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\ContentRepository\Domain\Projection\Content\TraversableNodeInterface;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObjectFactory;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\Editable;

final class HeadlineFactory extends AbstractComponentPresentationObjectFactory
{
    public function forCardNode(TraversableNodeInterface $node): HeadlineInterface
    {
        return new Headline(
            HeadlineSize::fromString($node->getProperty('headline__size')),
            HeadlineStyle::fromString($node->getProperty('headline__style')),
            HeadlineType::fromString($node->getProperty('headline__type')),
            Editable::fromNodeProperty($node, 'headline')
        );
    }
}
