<?php 

namespace Dtn\Office\Controller\Adminhtml\Employee;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Dtn\Office\Model\EmployeeFactory;
	
class Delete extends Action implements HttpPostActionInterface
{
	/**
	 * @var \Dtn\Office\Model\EmployeeFactory
	 */
	private $employeeFactory;

	/**
	 * @var \Magento\Backend\Model\View\Result\Redirect
	 */
	private $resultRedirect;

	/** 
	 * @param Context $context
	 * @param EmployeeFactory $employeeFactory
	 */

	public function __construct(
		Context $context,
		EmployeeFactory $employeeFactory
	) {
		parent::__construct($context);
		$this->employeeFactory = $employeeFactory;
	}

	public function execute()
	{
		$id = $this->getRequest()->getParam('entity_id');
		$employee = $this->employeeFactory->create()->load($id)->delete();
		try {
			$this->messageManager->addSuccessMessage(__('You deleted the employee !'));
		} catch (\Exception $e) {
			$this->messageManager->addExceptionMessage($e, __('Some things went wrong while delete the employee !'));
		}

		$resultRedirect = $this->resultRedirectFactory->create();
		return $resultRedirect->setPath('*/*/');
	}
}