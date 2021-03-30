<?php declare(strict_types=1);
namespace Vendor\Site\Application;

/*
 * This file is part of the Vendor.Site package.
 */

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\I18n\Translator;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\Eel\ProtectedContextAwareInterface;
use Vendor\Site\Presentation\Block\Deck\DeckLayout;

class DeckLayoutProvider extends AbstractDataSource implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var Translator
     */
    protected $translator;

    /**
     * @var string
     */
    protected static $identifier = 'vendor-site-deck-layouts';

    public function getData(NodeInterface $node = null, array $arguments = []): array
    {
        $deckLayouts = [];
        foreach (DeckLayout::getValues() as $value) {
            $deckLayouts[$value]['label'] = $this->translator->translateById(
                'deckLayout.' . $value,
                [],
                null,
                null,
                'Deck',
                'Vendor.Site'
            ) ?: $value;
        }

        return $deckLayouts;
    }

    /**
     * @return array|string[]
     */
    public function getValues(): array
    {
        return DeckLayout::getValues();
    }

    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }
}
