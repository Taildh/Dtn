<?php 

namespace Dtn\Office\Controller\Employee;

use Dtn\Office\Model\DepartmentFactory;
use Dtn\Office\Model\EmployeeFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Edit extends Action
{
  
  public function execute()
  {
    $this->_view->loadLayout();
    $this->_view->renderLayout();
  }

}

 ?>