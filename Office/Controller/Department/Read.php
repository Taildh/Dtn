<?php 

namespace Dtn\Office\Controller\Department;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Read extends Action
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
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param DepartmentFactory $departmentFactory
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
     * Read Action
     *
     * @return \Magento\Framework\View\Result\Page
     */

    public function execute()
    {	
    	$id = $this->getRequest()->getParams('id');
		$department = $this->departmentFactory->create();
        $department->load($id);
        echo "ID: " . $department['entity_id'];
        echo "<br>";
        echo "Name: " . $department['name'];
			/*
			\Zend_Debug::dump($department->toArray());
			array(2) {
			["entity_id"] => string(2) "28"
			["name"] => string(8) "Research"
			}
			*/
    }


}


 ?>