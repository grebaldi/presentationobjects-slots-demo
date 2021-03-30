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
use Vendor\Site\Presentation\Block\Headline\HeadlineStyle;

class HeadlineStyleProvider extends AbstractDataSource implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var Translator
     */
    protected $translator;

    /**
     * @var string
     */
    protected static $identifier = 'vendor-site-headline-styles';

    public function getData(NodeInterface $node = null, array $arguments = []): array
    {
        $headlineStyles = [];
        foreach (HeadlineStyle::getValues() as $value) {
            $headlineStyles[$value]['label'] = $this->translator->translateById(
                'headlineStyle.' . $value,
                [],
                null,
                null,
                'Headline',
                'Vendor.Site'
            ) ?: $value;
        }

        return $headlineStyles;
    }

    /**
     * @return array|string[]
     */
    public function getValues(): array
    {
        return HeadlineStyle::getValues();
    }

    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }
}
