<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Headline;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\Flow\Annotations as Flow;
use PackageFactory\AtomicFusion\PresentationObjects\Fusion\AbstractComponentPresentationObject;
use Vendor\Site\Presentation\Block\Headline\HeadlineSize;
use Vendor\Site\Presentation\Block\Headline\HeadlineStyle;
use Vendor\Site\Presentation\Block\Headline\HeadlineType;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\SlotInterface;

/**
 * @Flow\Proxy(false)
 */
final class Headline extends AbstractComponentPresentationObject implements HeadlineInterface
{
    private HeadlineSize $size;

    private HeadlineStyle $style;

    private HeadlineType $type;

    private SlotInterface $content;

    public function __construct(
        HeadlineSize $size,
        HeadlineStyle $style,
        HeadlineType $type,
        SlotInterface $content
    ) {
        $this->size = $size;
        $this->style = $style;
        $this->type = $type;
        $this->content = $content;
    }

    public function getSize(): HeadlineSize
    {
        return $this->size;
    }

    public function getStyle(): HeadlineStyle
    {
        return $this->style;
    }

    public function getType(): HeadlineType
    {
        return $this->type;
    }

    public function getContent(): SlotInterface
    {
        return $this->content;
    }
}
