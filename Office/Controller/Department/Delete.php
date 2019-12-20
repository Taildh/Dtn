<?php 

namespace Dtn\Office\Controller\Department;

use Dtn\Office\Model\DepartmentFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

class Delete extends Action
{
	/**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
	 *	@var DepartmentFactory
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

	/**
     * Delete Action
     *
     * @return \Magento\Framework\View\Result\Page
     */

	public function execute()
	{	
		$id = $this->getRequest()->getParam('id');
		// var_dump($id);
		// $newArray = array_keys($id);
		// $caiDeXoa = $newArray['0'];
		$department = $this->departmentFactory->create();
		$department->load($id);
		$department->delete();


		// // if ($department->getId()) {
		// // 	echo "Khong ton tai ";
		// // }else{
			
		// // 	$department->load($id);
		// // 	$department->delete();
		// // 	echo "Ban da xoa thanh cong";
		// // }

		/** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('office/department/listt');
        return $resultRedirect;



	}

}

 ?>