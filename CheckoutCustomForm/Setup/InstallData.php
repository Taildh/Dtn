<?php
/**
 * Install custom checkout Data
 *
 * @package   Dtn\CheckoutCustomForm
 * @author    Slawomir Dtn <slawek.Dtn@gmail.com>
 * @copyright © 2017 Slawomir Dtn
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Dtn\CheckoutCustomForm\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Quote\Setup\QuoteSetupFactory;
use Magento\Sales\Setup\SalesSetupFactory;
use Magento\Framework\DB\Ddl\Table;
use Dtn\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class InstallData
 *
 * @category InstallData
 * @package  Dtn\CheckoutCustomForm\Setup
 */
class InstallData implements InstallDataInterface
{
    /**
     * SalesSetupFactory
     *
     * @var SalesSetupFactory
     */
    protected $salesSetupFactory;

    /**
     * QuoteSetupFactory
     *
     * @var QuoteSetupFactory
     */
    protected $quoteSetupFactory;

    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    protected $setup;

    /**
     * InstallData constructor.
     *
     * @param SalesSetupFactory $salesSetupFactory SalesSetupFactory
     * @param QuoteSetupFactory $quoteSetupFactory QuoteSetupFactory
     */
    public function __construct(
        SalesSetupFactory $salesSetupFactory,
        QuoteSetupFactory $quoteSetupFactory
    ) {
        $this->salesSetupFactory = $salesSetupFactory;
        $this->quoteSetupFactory = $quoteSetupFactory;
    }

    /**
     * Install data
     *
     * @param ModuleDataSetupInterface $setup   ModuleDataSetupInterface
     * @param ModuleContextInterface   $context ModuleContextInterface
     *
     * @return void
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->setup = $setup->startSetup();
        $this->installQuoteData();
        $this->installSalesData();
        $this->setup = $setup->endSetup();
    }

    /**
     * Install quote custom data
     *
     * @return void
     */
    public function installQuoteData()
    {
        $quoteInstaller = $this->quoteSetupFactory->create(
            [
                'resourceName' => 'quote_setup',
                'setup' => $this->setup
            ]
        );
        $quoteInstaller
            ->addAttribute(
                'quote',
                CustomFieldsInterface::CHECKOUT_COMMENT,
                ['type' => Table::TYPE_TEXT, 'length' => '64k', 'nullable' => true]
            );
    }

    /**
     * Install sales custom data
     *
     * @return void
     */
    public function installSalesData()
    {
        $salesInstaller = $this->salesSetupFactory->create(
            [
                'resourceName' => 'sales_setup',
                'setup' => $this->setup
            ]
        );
        $salesInstaller
            ->addAttribute(
                'order',
                CustomFieldsInterface::CHECKOUT_COMMENT,
                ['type' => Table::TYPE_TEXT, 'length' => '64k', 'nullable' => true, 'grid' => false]
            );
    }
}
