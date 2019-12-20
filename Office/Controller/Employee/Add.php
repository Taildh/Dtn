<?php 

namespace Dtn\Office\Controller\Employee;

use Dtn\Office\Model\DepartmentFactory;
use Dtn\Office\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Add extends Action
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
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param DepartmentFactory $departmentFactory
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
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */

    public function execute()
    {   
        $data = $this->getRequest()->getParams();
        // var_dump($data);
        // die;
    	$employee = $this->employeeFactory->create();
    	$employee->setEmail($data['email']);
        $employee->setDepartment_id($data['department_id']);
        $employee->setFirstname($data['firstname']);
        $employee->setLastname($data['lastname']);


        // $employee->setDepartment_id(7);
    	// $employee->setEmail('huutai@gmail.com');
    	// $employee->setFirstname('Huu');
    	// $employee->setLastname('Tai Smile');
    	// $employee->setServiceYears(10);
    	// $employee->setDob('1999-12-12');
    	// $employee->setSalary(12345);
    	// $employee->setVatNumber('GB123451234');
    	// $employee->setNote('nOtE #2');
    	$employee->save();

    	$resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('office/employee/listemployee');
        return $resultRedirect;

    }
}

 ?>