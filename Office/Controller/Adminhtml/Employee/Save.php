<?php 

namespace Dtn\Office\Controller\Adminhtml\Employee;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Model\View\Result\Redirect;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
	
	/**
     * @var \Dtn\Office\Model\DepartmentFactory
     */
    private $employeeFactory;

    /**
     * @var \Magento\Backend\Model\View\Result\Redirect
     */
    private $resultRedirect;
    /**
     * @param Action\Context $context
     * @param \Dtn\Office\Model\DepartmentFactory $departmentFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Dtn\Office\Model\EmployeeFactory $employeeFactory
    ) {    
        parent::__construct($context);
        $this->employeeFactory = $employeeFactory;
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */


	public function execute()
	{
		$data = $this->getRequest()->getPostValue();
		$employee = $this->employeeFactory->create()->load($data['entity_id']);
		$employee->setEmail($data['email'])
				 ->setFirstname($data['firstname'])
				 ->setLastname($data['lastname'])
				 ->setDepartment_id($data['department_id'])
				 ->save();
		try {
			$this->messageManager->addSuccessMessage(__('You saved the employee !'));
		} catch (LocalizedException $e) {
			$this->messageManager->addErrorMessage($e->getMessage());
		} catch (\Exception $e) {
			$this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the employee.'));
		}

		$resultRedirect = $this->resultRedirectFactory->create();
		return $resultRedirect->setPath('*/*/');
	}
}	