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
use Vendor\Site\Presentation\Block\Headline\HeadlineSize;

class HeadlineSizeProvider extends AbstractDataSource implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var Translator
     */
    protected $translator;

    /**
     * @var string
     */
    protected static $identifier = 'vendor-site-headline-sizes';

    public function getData(NodeInterface $node = null, array $arguments = []): array
    {
        $headlineSizes = [];
        foreach (HeadlineSize::getValues() as $value) {
            $headlineSizes[$value]['label'] = $this->translator->translateById(
                'headlineSize.' . $value,
                [],
                null,
                null,
                'Headline',
                'Vendor.Site'
            ) ?: $value;
        }

        return $headlineSizes;
    }

    /**
     * @return array|string[]
     */
    public function getValues(): array
    {
        return HeadlineSize::getValues();
    }

    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }
}
