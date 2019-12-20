<?php 

namespace Dtn\Office\Controller\Employee;

use Dtn\Office\Model\EmployeeFactory;
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
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Edit constructor.
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
     * Read Action
     *
     * @return \Magento\Framework\View\Result\Page
     */

    public function execute()
    {
    	$id = $this->getRequest()->getParams('id');
		$employee = $this->employeeFactory->create();
        $employee->load($id);

    	echo "ID: " . $employee['entity_id'];
        echo "<br>";
        echo "Email: " . $employee['email'];
        echo "<br>";
        echo "FirstName: " . $employee['firstname'];
        echo "<br>";
        echo "LastName: " . $employee['lastname'];echo "<br>";
        echo "LastName: " . $employee['dob'];
    }
}


 ?>