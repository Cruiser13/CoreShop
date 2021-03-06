<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Component\Address\Formatter;

use CoreShop\Component\Address\Model\AddressInterface;
use Pimcore\Placeholder;

class AddressFormatter implements AddressFormatterInterface
{
    /**
     * {@inheritdoc}
     */
    public function formatAddress(AddressInterface $address, $asHtml = true)
    {
        $objectVars = get_object_vars($address);
        $objectVars['country'] = $address->getCountry();

        $placeHolder = new Placeholder();
        $address = $placeHolder->replacePlaceholders($address->getCountry()->getAddressFormat(), $objectVars);

        if ($asHtml) {
            $address = nl2br($address);
        }

        return $address;
    }
}
