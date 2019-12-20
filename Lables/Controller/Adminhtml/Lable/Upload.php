<?php

namespace Dtn\Lables\Controller\Adminhtml\Lable;

use Dtn\Lables\Model\Lable\ImageUploader;
use Magento\Backend\App\Action;
use Magento\Framework\Controller\ResultFactory;

class Upload extends \Magento\Backend\App\Action
{
    protected $imageUploader;

    public function __construct(
        Action\Context $context,
        \Magento\Backend\App\Action\Context $context,
        ImageUploader $imageUploader
    )
    {
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Dtn_Lables::lables') || $this->_authorization->isAllowed('Dtn_Lables::lable');
    }

    public function execute()
    {
        $imageId = $this->_request->getParam('param_name', 'image');
        try {
            $result = $this->imageUploader->saveFileToTmpDir($imageId);
            $result['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
        } catch (\Exception $e) {
            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}