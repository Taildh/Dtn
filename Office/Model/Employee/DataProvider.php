<?php 

namespace Dtn\Office\Model\Employee;

use Dtn\Office\Model\ResourceModel\Employee\CollectionFactory;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;
use Magento\Framework\AuthorizationInterface;

/**
 * Class DataProvider
 */

class DataProvider extends \Magento\Ui\DataProvider\ModifierPoolDataProvider
{
	/**
     * @var \Dtn\Office\Model\ResourceModel\Department\Collection
     */
    protected $collection;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var AuthorizationInterface
     */
    private $auth;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $employeeCollectionFactory
     * @param DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     * @param PoolInterface|null $pool
     * @param AuthorizationInterface|null $auth
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $employeeCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = [],
        PoolInterface $pool = null,
        ?AuthorizationInterface $auth = null
    ) {
        $this->collection = $employeeCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data, $pool);
        $this->auth = $auth ?? ObjectManager::getInstance()->get(AuthorizationInterface::class);
        $this->meta = $this->prepareMeta($this->meta);
    }

    /**
     * Prepares Meta
     *
     * @param array $meta
     * @return array
     */

    public function prepareMeta(array $meta)
    {
    	return $meta;
    }

    /**
     * Get data
     *
     * @return array
     */

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var $department \Dtn\Office\Model\Department */
        foreach ($items as $employee) {
            $this->loadedData[$employee->getId()] = $employee->getData();
        }

        $data = $this->dataPersistor->get('dtn_office_employee_entity');
        if (!empty($data)) {
            $employee = $this->collection->getNewEmptyItem();
            $employee->setData($data);
            $this->loadedData[$employee->getId()] = $employee->getData();
            $this->dataPersistor->clear('dtn_office_employee_entity');
        }

        return $this->loadedData;
    }

    /**
     * @inheritDoc
     */

    public function getMeta()
    {
        $meta = parent::getMeta();

        if (!$this->auth->isAllowed('Dtn_Office::save_design')) {
            $designMeta = [
                'design' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'disabled' => true
                            ]
                        ]
                    ]
                ],
                'custom_design_update' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'disabled' => true
                            ]
                        ]
                    ]
                ]
            ];
            $meta = array_merge_recursive($meta, $designMeta);
        }

        return $meta;
    }
}