<?php
namespace Dtn\Office\Model\Attribute\Source;

class SourceName implements \Magento\Framework\Option\ArrayInterface
{
  protected $departmentCollection;

    public function __construct(
    \Dtn\Office\Model\ResourceModel\Department\Collection $departmentCollection
  ) {
    $this->departmentCollection = $departmentCollection;
  }

  public function toOptionArray()
  {

    // Load the employees as options
    $employees = $this->departmentCollection->load();
    $options = [];

    /* @todo: add query to load selected options */

    foreach ($employees as $employee){
      $options[] = [
        "value" => $employee->getId(),
        "label" => $employee->getName()
      ];
    }

    return $options;
  }
}