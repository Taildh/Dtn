<?php

namespace Dtn\Office\Model\ResourceModel\Department;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{	

	protected $_idFieldName = 'entity_id';

    protected function _construct()
    {	
        $this->_init(
            \Dtn\Office\Model\Department::class,
            \Dtn\Office\Model\ResourceModel\Department::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}