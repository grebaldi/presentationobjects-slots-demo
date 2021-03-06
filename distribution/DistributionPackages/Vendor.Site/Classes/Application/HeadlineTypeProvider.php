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
use Vendor\Site\Presentation\Block\Headline\HeadlineType;

class HeadlineTypeProvider extends AbstractDataSource implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var Translator
     */
    protected $translator;

    /**
     * @var string
     */
    protected static $identifier = 'vendor-site-headline-types';

    public function getData(NodeInterface $node = null, array $arguments = []): array
    {
        $headlineTypes = [];
        foreach (HeadlineType::getValues() as $value) {
            $headlineTypes[$value]['label'] = $this->translator->translateById(
                'headlineType.' . $value,
                [],
                null,
                null,
                'Headline',
                'Vendor.Site'
            ) ?: $value;
        }

        return $headlineTypes;
    }

    /**
     * @return array|string[]
     */
    public function getValues(): array
    {
        return HeadlineType::getValues();
    }

    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }
}
