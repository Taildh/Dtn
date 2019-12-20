<?php 

namespace Dtn\Office\Controller\Department;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;

class SaveEdit extends Action
{

	/**
	 * @var PageFactory
	 */

	protected $pageFactory;

	/**
	 * @var DepartmentFactory
	 */

	protected $departmentFactory;

	/**
	  * Edit constructor
	  * @param Context $context
	  * @param PageFactory $pageFactory
	  * @param DepartmentFactory
	  $departmentFactory
	  */

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		DepartmentFactory $departmentFactory
	)
	{
		parent::__construct($context);
		$this->pageFactory = $pageFactory;
		$this->departmentFactory = $departmentFactory;
	}

	/** 
	 *	@return \Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		
		$params = $this->getRequest()->getParams();
		$department = $this->departmentFactory->create()->load($params['id']);
		$department->setName($params['name']);
		$department->save();
		// var_dump($params);

		// die;

		$resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath('office/department/listt');

		return $resultRedirect;
	}

}

 ?>