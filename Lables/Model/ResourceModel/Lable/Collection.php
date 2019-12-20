<?php

namespace Dtn\Lables\Model\ResourceModel\Lable;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('Dtn\Lables\Model\Lable','Dtn\Lables\Model\ResourceModel\Lable');
    }
}