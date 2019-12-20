<?php

namespace Dtn\Office\Controller\Adminhtml;

abstract class Department extends \Magento\Backend\App\Action
{
	/**
	 * Authorization level of a  basic admin session
	 * 
	 * @see _isAllowed()
	 */
	const ADMIN_RESOURCE = 'Dtn_Office::department';

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
	public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
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
		$resultPage->setActiveMenu('Dtn_Office::department')
		->addBreadcrumb(__('Office'), __('Office'))
		->addBreadcrumb(__('Department'), __('Department'));
		return $resultPage;
	}
}