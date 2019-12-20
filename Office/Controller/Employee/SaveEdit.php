<?php 

namespace Dtn\Office\Controller\Employee;

use Dtn\Office\Model\EmployeeFactory;
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
	 * @var EmployeeFactory
	 */

	protected $employeeFactory;

	/**
	  * Edit constructor
	  * @param Context $context
	  * @param PageFactory $pageFactory
	  * @param EmployeeFactory
	  $employeeFactory
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
	 *	@return \Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		
		$data = $this->getRequest()->getParams();
		
		$employee = $this->employeeFactory->create()->load($data['entity_id']);
		$employee->setEmail($data['email']);
		$employee->setDepartment_id($data['department_id']);
		$employee->setFirstname($data['firstname']);
		$employee->setLastname($data['lastname']);
		$employee->save();
		// var_dump($data);

		// die;

		$resultRedirect = $this->resultRedirectFactory->create();
		$resultRedirect->setPath('office/employee/listemployee');

		return $resultRedirect;
	}

}

 ?>

 