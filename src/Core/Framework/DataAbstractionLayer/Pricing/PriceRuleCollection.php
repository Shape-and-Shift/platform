<?php declare(strict_types=1);

namespace Shopware\Core\Framework\DataAbstractionLayer\Pricing;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @extends EntityCollection<PriceRuleEntity>
 *
 * @package core
 */
class PriceRuleCollection extends EntityCollection
{
    public function getApiAlias(): string
    {
        return 'dal_price_rule_collection';
    }

    protected function getExpectedClass(): string
    {
        return PriceRuleEntity::class;
    }
}
