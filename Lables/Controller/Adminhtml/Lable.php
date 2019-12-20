<?php

namespace Dtn\Lables\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class Lable extends \Magento\Backend\App\Action
{
    protected $_resultForwardFactory;

    protected $_resultLayoutFactory;

    protected $resultPageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultLayoutFactory = $resultLayoutFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }

    protected function _initAction()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Dtn_Lables::lables');
        $resultPage->addBreadcrumb(__('Lables'), __('Lables'));
        return $resultPage;
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dtn_Lables::lables');
    }
}