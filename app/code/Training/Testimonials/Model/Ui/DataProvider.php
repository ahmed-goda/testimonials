<?php

namespace Training\Testimonials\Model\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Training\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
   protected $loadedData;
    public function __construct(
        CollectionFactory $collectionFactory,
        $name,
        $primaryFieldName,
        $requestFieldName, array $meta = [],
        array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData)) {
           return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        foreach ($items as $testimonial) {
            $this->loadedData[$testimonial->getId()]['testimonial'] = $testimonial->getData();
        }

        return $this->loadedData;
    }
}