<?php

namespace Dtn\Lables\Controller\Adminhtml\Lable;

class Index extends \Dtn\Lables\Controller\Adminhtml\Lable
{
    public function execute()
    {
        $resultPage = $this->_initAction();
        $resultPage->getConfig()->getTitle()->prepend(__('Lable Products Management'));
        return $resultPage;

    }
}