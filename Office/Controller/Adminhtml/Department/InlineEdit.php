<?php 

namespace Dtn\Office\Controller\Adminhtml\Department;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

class InlineEdit extends Action 
{	

	protected $jsonFactory;

	public function __construct(
		Context $context,
		JsonFactory $jsonFactory
	) {
		parent::__construct($context);
		$this->jsonFactory = $jsonFactory;
	}

	public function execute()
	{
		$resultJson = $this->jsonFactory->create();
		$error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax')) {
        	$postItems = $this->getRequest()->getParam('items', []);
        	if (!count($postItems)) {
        		$messages[] =__('Please correct the data sent.');
        		$error = true;
        	} else {
        		foreach (array_keys($postItems) as $entityId) {
        			$model = $this->_objectManager->create('Dtn\Office\Model\Department')->load($entityId);
        			try {
        				$model->setData(array_merge($model->getData(), $postItems[$entityId]));
        				$model->save();
        			} catch (Exception $e) {
        				$$messages[] = "[Error:]  {$e->getMessage()}";
                        $error = true;
        			}
        		}
        	}
        }
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
	}
}