<?php 

namespace Dtn\Office\Block;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Edit extends \Magento\Framework\View\Element\Template
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

	public function Edit()
	{	
		$id = $this->getRequest()->getParam('id');
		$department = $this->departmentFactory->create();
		$department->load($id);
		return $department;		
	}

	public function urlSave()
	{
		return '/office/department/saveedit';

		//return '/tenFrontName/tenController/tenAction'
	}
 }


?>