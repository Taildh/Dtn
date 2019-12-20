<?php 

namespace Dtn\Office\Block;

use Dtn\Office\Model\EmployeeFactory;
use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class ListEmployee extends \Magento\Framework\View\Element\Template
{
	protected $employeeFactory; 

	protected $employeeCollectionFactory;

	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context, 
		EmployeeFactory $employeeFactory,
		DepartmentFactory $departmentFactory,
		\Dtn\Office\Model\ResourceModel\Employee\CollectionFactory $employeeCollectionFactory

	)
	{
		parent::__construct($context);
		$this->employeeFactory = $employeeFactory;
		$this->departmentFactory = $departmentFactory;
		$this->employeeCollectionFactory = $employeeCollectionFactory;
	}
	public function getDepartment()
	{
		$department = $this->departmentFactory->create()->getCollection();
		return $department;
	}

	public function getEmployee()
	{
		$employee = $this->employeeCollectionFactory->create()->addAttributeToSelect('*');
		$employee->load();

		return $employee;
	}

	public function listEmployee()
	{
		return '/office/employee/listEmployee';
	}

	public function addEmployee() {
		return '/office/employee/add';
	}

	public function deleteEmployee()
	{
		return '/office/employee/delete/id/';
	}

	public function editEmployee()
	{
		return '/office/employee/edit/id/';
	}

	public function edit()
	{
		$id = $this->getRequest()->getParam('id');
		$employee = $this->employeeFactory->create();
		$employee->load($id);
		return $employee; 
	}

	public function saveEdit()
	{
		return '/office/employee/saveedit/';
	}
}

 ?>