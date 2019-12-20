<?php

namespace Dtn\Office\Model;

class Employee extends \Magento\Framework\Model\AbstractModel
{
    const ENTITY = 'dtn_office_employee';

    protected function _construct()
    {
        $this->_init(\Dtn\Office\Model\ResourceModel\Employee::class);
    }
}