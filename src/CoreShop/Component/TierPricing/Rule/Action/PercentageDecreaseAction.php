<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2019 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Component\TierPricing\Rule\Action;

use CoreShop\Component\TierPricing\Model\ProductTierPriceRangeInterface;
use CoreShop\Component\TierPricing\Model\TierPriceAwareInterface;
use Symfony\Component\Form\FormInterface;

class PercentageDecreaseAction implements TierPriceActionInterface
{
    /**
     * {@inheritdoc}
     */
    public function calculate(ProductTierPriceRangeInterface $range, TierPriceAwareInterface $subject, int $realItemPrice, array $context)
    {
        return max($realItemPrice - ((int) round(($range->getPercentage() / 100) * $realItemPrice)), 0);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatchFormValidation(FormInterface $form, ProductTierPriceRangeInterface $range)
    {

    }
}
