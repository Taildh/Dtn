<?php 

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Backend\Model\View\Result\Redirect;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{

    /**
     * @var \Dtn\Office\Model\DepartmentFactory
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
        parent::__construct($context);
        $this->departmentFactory = $departmentFactory;
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
       $department = $this->departmentFactory->create()->load($data['entity_id']);
       $department->setName($data['name'])->save();
       try {
            $this->messageManager->addSuccessMessage(__('You saved the department.'));
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the department.'));
            }
        $resultRedirect = $this->resultRedirectFactory->create();    
        return $resultRedirect->setPath('*/*/');
    }
}