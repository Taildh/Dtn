<?php

namespace Dtn\Lables\Controller\Adminhtml\Lable;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;

class Edit extends \Magento\Backend\App\Action implements HttpGetActionInterface
{
    protected $coreRegistry;

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        parent::__construct($context);
    }


    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        $model = $this->_objectManager->create('Dtn\Lables\Model\Lable');

        $registryObject = $this->_objectManager->get('Magento\Framework\Registry');

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This lables no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Dtn_Lables::lable')
            ->addBreadcrumb(
                $id ? __('Edit Lable') : __('New Lable'),
                $id ? __('Edit Lable') : __('New Lable')
            );
        $resultPage->getConfig()->getTitle()->prepend(__('Lable'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Lable'));
        return $resultPage;
    }
}