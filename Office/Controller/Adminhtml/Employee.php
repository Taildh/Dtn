<?php

namespace Dtn\Office\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Backend\App\Action;


abstract class Department extends Action
{
	/**
	 * Authorization level of a  basic admin session
	 * 
	 * @see _isAllowed()
	 */
	const ADMIN_RESOURCE = 'Dtn_Office::employee';

	/**
	 * Core registry
	 *
	 * @var \Magento\Framework\Registry
	 */
	protected $_coreRegistry;

	/**
	 * @param \Magento\Backend\App\Action\Context $context
	 * @param \Magento\Framework\Registry $coreRegistry
	 */
	public function __construct(
		Context $context, 
		Registry $coreRegistry
	)
	{
		$this->_coreRegistry = $coreRegistry;
		parent::__construct($context);
	}
	/**
	 * Init page
	 * @param \Magento\Backend\Model\View\Result\Page $resultPage
	 * @return \Magento\Backend\Model\View\Result\Page
	 */
	protected function initPage($resultPage)
	{
		$resultPage->setActiveMenu('Dtn_Office::employee')
		->addBreadcrumb(__('Office'), __('Office'))
		->addBreadcrumb(__('Employee'), __('Employee'));
		return $resultPage;
	}
}