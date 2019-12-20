<?php 

namespace Dtn\Office\Controller\Employee;

use Magento\Framework\App\Action\Action;

class ListEmployee extends Action
{
  public function execute()
  {

    $this->_view->loadLayout();
    $this->_view->renderLayout();
  }
}

?>