<?php

namespace Dtn\Lables\Model\ResourceModel;

class Lable extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('lables','id');
    }
}