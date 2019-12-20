<?php 

namespace Dtn\Office\Controller\Department;

use Magento\Framework\App\Action\Action;

class Listt extends Action
{
  public function execute()
  {
    $this->_view->loadLayout();
    $this->_view->renderLayout();
  }
}

?>