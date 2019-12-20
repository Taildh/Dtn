<?php 

namespace Dtn\Office\Block;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Listt extends \Magento\Framework\View\Element\Template
{

	protected $departmentFactory;

	public function __construct(
		\Magento\Framework\View\Element\Template\
		Context $context,
		DepartmentFactory $departmentFactory
	)
	{
		parent::__construct($context);
		$this->departmentFactory = $departmentFactory;

	}
	

	public function getDepartment()
	{	
		$department = $this->departmentFactory->create()->getCollection();
		return $department;		
	}

	public function addDepartment()
	{	
		return '/office/department/add';
	}

	public function deleteDp()
	{
		return '/office/department/delete/id/';
	}
}	

?>