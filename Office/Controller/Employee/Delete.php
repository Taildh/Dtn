<?php 

namespace Dtn\Office\Controller\Employee;

use Dtn\Office\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;


class Delete extends Action
{
	/**
	 * @var PageFactory
	 */

	protected $pageFactory;

	/**
	 * @var EmployeeFactory
	 */

	protected $employeeFactory;

	/**
	 * @param Context $context
	 * @param PageFactory $pageFactory
	 * @param EmployeeFactory $employeeFactory
	 */

	public function __construct(
		Context $context, 
		PageFactory $pageFactory,
		EmployeeFactory $employeeFactory
	)
	{
		parent::__construct($context);
		$this->pageFactory = $pageFactory;
		$this->employeeFactory = $employeeFactory;
	}

	/**
	 * Delete Action
	 *
	 * @return \Magento\Framework\View\Result\Page 
	 */

	public function execute()
	{
		$id = $this->getRequest()->getParam('id');
		
		$employee = $this->employeeFactory->create();
		$employee->load($id);
		$employee->delete();

		$resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath('office/employee/listemployee');
		return $resultRedirect;
	}


}

?>