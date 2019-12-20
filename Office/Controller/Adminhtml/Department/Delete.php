<?php

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Model\View\Result\Redirect;

class Delete extends \Magento\Backend\App\Action implements HttpPostActionInterface

{
    /**
     * @var \Magento\Cms\Model\DepartmentFactory
     */
    private $departmentFactory;

    /**
     * @var \Magento\Backend\Model\View\Result\Redirect
     */
    private $resultRedirect;
    /**
     * @param Action\Context $context
     * @param \Dtn\Office\Model\DepartmentFactory $departmentFactory
     */
    public function __construct(
        Context $context,
        DepartmentFactory $departmentFactory
    ) {
        $this->departmentFactory = $departmentFactory;
        
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */

    public function execute()
    {
        $id = $this->getRequest()->getParam('entity_id');
        $department = $this->departmentFactory->create()->load($id);
        $department->delete();
        try {
            $this->messageManager->addSuccessMessage(__('You deleted the department.'));
        } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while delete the department.'));
            }
        $resultRedirect = $this->resultRedirectFactory->create();    
        return $resultRedirect->setPath('*/*/');
    }
}