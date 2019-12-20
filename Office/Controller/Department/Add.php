<?php 

namespace Dtn\Office\Controller\Department;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Element\Messages;

class Add extends Action
{    
	/**
	 * @var PageFactory
	 */
	protected $pageFactory;

	/**
	 *	@var DepartmentFactory
	 */
	protected $departmentFactory;

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
     	DepartmentFactory $departmentFactory
     )
     {
     	parent::__construct($context);
     	$this->pageFactory = $pageFactory;
     	$this->departmentFactory = $departmentFactory;
     }

     /**
     * Index Action
     *
     * @return \Magento\Framework\View\Result\Page
     */

     public function execute()
     {
      $data = $this->getRequest()->getParams();

      if (empty($data)) {
        
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('office/department/listt');
        return $resultRedirect;
      }else {
        $department = $this->departmentFactory->create();
        $department->setName($data['name']);
        if($department->save()){
          $this->messageManager->addSuccessMessage(__('You saved the data.'));
        }else{
          $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('office/department/listt');
        return $resultRedirect;
        }
     }
}

 ?>