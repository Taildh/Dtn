<?php

namespace Dtn\Lables\Controller\Adminhtml\Lable;

use Dtn\Lables\Model\LableFactory;
use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    private $lableFactory;

    private $resultRedirect;

    protected $imageUploader;

    public function __construct(
        Action\Context $context,
        LableFactory $lableFactory
    ){
        $this->lableFactory = $lableFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $lable = $this->$lableFactory->create();
        $lable->setName($data['name'])
                ->setLable_text($data['lable_text'])
                ->setImage($data['image']);
        $lable->save();
        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('*/*/');
    }
}