<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Card;

/*
 * This file is part of the Vendor.Site package.
 */

use PackageFactory\AtomicFusion\PresentationObjects\Fusion\ComponentPresentationObjectInterface;
use Sitegeist\Kaleidoscope\EelHelpers\ImageSourceHelperInterface;
use Vendor\Site\Presentation\Block\Headline\HeadlineInterface;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\SlotInterface;

interface CardInterface extends ComponentPresentationObjectInterface
{
    public function getImage(): ?ImageSourceHelperInterface;

    public function getHeadline(): ?HeadlineInterface;

    public function getContent(): ?SlotInterface;
}
