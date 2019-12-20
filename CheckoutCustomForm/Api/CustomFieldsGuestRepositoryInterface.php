<?php
/**
 * Checkout custom fields guest repository interface
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
 * Interface CustomFieldsGuestRepositoryInterface
 *
 * @category Api/Interface
 * @package  Dtn\CheckoutCustomForm\Api
 */
interface CustomFieldsGuestRepositoryInterface
{
    /**
     * Save checkout custom fields
     *
     * @param string                                                   $cartId       Guest Cart id
     * @param \Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface $customFields Custom fields
     *
     * @return \Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        string $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface;
}
