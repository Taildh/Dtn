<?php

namespace Dtn\Lables\Controller\Adminhtml\Lable;

use Dtn\Lables\Controller\Adminhtml\Lable;
use Magento\Framework\Controller\ResultFactory;

class NewAction extends Lable
{
    public function execute()
    {
        $resultForward = $this->resultFactory->create(ResultFactory::TYPE_FORWARD);
        return $resultForward->forward('edit');
    }
}