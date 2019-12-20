<?php 

namespace Dtn\Office\Controller\Employee;

use Dtn\Office\Model\EmployeeFactory;
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
     * @var EmployeeFactory
     */
    protected $employeeFactory;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param EmployeeFactory $employeeFactory
     */

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        EmployeeFactory $employeeFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->employeeFactory = $employeeFactory;
    }

    public function execute()
    {
        $employee = $this->employeeFactory->create()->getCollection()->getData();

       ?>

        <table border=1 style="border-collapse: collapse;width:500px;text-align:center">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>FirstName</th>
                <th>LastName</th>
            </tr>
        <?php
        foreach ($employee as  $e)
        {?>
        <tr>
        <td><?= $e['entity_id'] ?> </td>
        <td><?= $e['email'] ?> </td>
        <td><?= $e['firstname'] ?> </td>
        <td><?= $e['lastname'] ?> </td>
        </tr>
        
        <?php } ?>

        </table>
        <?php

        }

    }    


?>