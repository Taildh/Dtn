<?php
/**
 * @package   Dtn\CheckoutCustomForm
 * @author    Slawomir Dtn <slawek.Dtn@gmail.com>
 * @copyright © 2017 Slawomir Dtn
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Dtn\CheckoutCustomForm\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class CustomFields
 *
 * @category Model/Data
 * @package  Dtn\CheckoutCustomForm\Model\Data
 */
class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{

    /**
     * Get checkout comment
     *
     * @return string|null
     */
    public function getCheckoutComment()
    {
        return $this->_get(self::CHECKOUT_COMMENT);
    }

    /**
     * Set checkout comment
     *
     * @param string|null $comment Comment
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutComment(string $comment = null)
    {
        return $this->setData(self::CHECKOUT_COMMENT, $comment);
    }
}
