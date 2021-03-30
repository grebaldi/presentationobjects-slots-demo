<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Headline;

/*
 * This file is part of the Vendor.Site package.
 */

use PackageFactory\AtomicFusion\PresentationObjects\Fusion\ComponentPresentationObjectInterface;
use Vendor\Site\Presentation\Block\Headline\HeadlineSize;
use Vendor\Site\Presentation\Block\Headline\HeadlineStyle;
use Vendor\Site\Presentation\Block\Headline\HeadlineType;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\SlotInterface;

interface HeadlineInterface extends ComponentPresentationObjectInterface
{
    public function getSize(): HeadlineSize;

    public function getStyle(): HeadlineStyle;

    public function getType(): HeadlineType;

    public function getContent(): SlotInterface;
}
