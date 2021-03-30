<?php declare(strict_types=1);
namespace Vendor\Site\Presentation\Block\Deck;

/*
 * This file is part of the Vendor.Site package.
 */

use PackageFactory\AtomicFusion\PresentationObjects\Fusion\ComponentPresentationObjectInterface;
use Vendor\Site\Presentation\Block\Deck\DeckLayout;
use PackageFactory\AtomicFusion\PresentationObjects\Presentation\Slot\SlotInterface;

interface DeckInterface extends ComponentPresentationObjectInterface
{
    public function getLayout(): DeckLayout;

    public function getContent(): SlotInterface;
}
