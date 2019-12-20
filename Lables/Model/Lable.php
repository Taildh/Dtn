<?php

namespace Dtn\Lables\Model;

class Lable extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Dtn\Lables\Model\ResourceModel\Lable');
    }
}