<?php

namespace Dtn\Office\Model\ResourceModel\Employee;

class Collection extends \Magento\Eav\Model\Entity\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Dtn\Office\Model\Employee::class,
            \Dtn\Office\Model\ResourceModel\Employee::class
        );
    }
}