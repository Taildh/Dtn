<?php
/**
 * Checkout custom fields repository interface
 *
 * @package   Dtn\CheckoutCustomForm
 * @author    Slawomir Dtn <slawek.Dtn@gmail.com>
 * @copyright © 2017 Slawomir Dtn
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Dtn\CheckoutCustomForm\Api;

use Magento\Sales\Model\Order;
use Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Interface CustomFieldsRepositoryInterface
 *
 * @category Api/Interface
 * @package  Dtn\CheckoutCustomForm\Api
 */
interface CustomFieldsRepositoryInterface
{
    /**
     * Save checkout custom fields
     *
     * @param int                                                      $cartId       Cart id
     * @param \Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface $customFields Custom fields
     *
     * @return \Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        int $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface;

    /**
     * Get checkoug custom fields
     *
     * @param Order $order Order
     *
     * @return CustomFieldsInterface
     */
    public function getCustomFields(Order $order) : CustomFieldsInterface;
}
