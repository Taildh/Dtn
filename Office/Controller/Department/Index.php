<?php 

namespace Dtn\Office\Controller\Department;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
	/**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * @var DepartmentFactory
     */
    protected $departmentFactory;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param DepartmentFactory $departmentFactory
     */

    public function __construct(
    	Context $context,
    	PageFactory $pageFactory,
    	DepartmentFactory $departmentFactory
    )
    {
    	parent::__construct($context);
    	$this->pageFactory = $pageFactory;
    	$this->departmentFactory = $departmentFactory;
    }

    public function execute()
    {

    	$department = $this->departmentFactory->create()->getCollection()->getData();
    	$department1 = $this->departmentFactory->create()->getCollection()->addFieldToFilter('entity_id', ['gt' => 20])->getData();
    	$department2 = $this->departmentFactory->create()->getCollection()->addFieldToFilter('name', ['like' => 'A%'])->getData();

    	echo '<table border=1 style="border-collapse: collapse;width:300px;text-align:center">';
        echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Name</th>";
        echo "</tr>";
        foreach ($department as  $value)
        {
        echo "<tr>";
            echo '<td>'.$value['entity_id'].'</td>';
            echo '<td>'.$value['name'].'</td>';
        echo "</tr>";
        }
        echo "</table>";
        echo "<h5>ID Lớn hơn 20</h5>";
        echo '<table border=1 style="border-collapse: collapse;width:300px;text-align:center">';
        echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Name</th>";
        echo "</tr>";
        foreach ($department1 as  $value)
        {
        echo "<tr>";
            echo '<td>'.$value['entity_id'].'</td>';
            echo '<td>'.$value['name'].'</td>';
        echo "</tr>";
        }
        echo "</table>";


        echo "<h5>Bắt đầu bằng ký tự 'A'</h5>";
        echo '<table border=1 style="border-collapse: collapse;width:300px;text-align:center">';
        echo "<tr>";
           echo "<th>ID</th>";
           echo "<th>Name</th>";
        echo "</tr>";
        foreach ($department2 as  $value)
        {
        echo "<tr>";
            echo '<td>'.$value['entity_id'].'</td>';
            echo '<td>'.$value['name'].'</td>';
        echo "</tr>";
        }
        echo "</table>";
    }
}

 ?>