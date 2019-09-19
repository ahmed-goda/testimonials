<?php

namespace Training\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\{UiComponentFactory,
                                    UiComponent\ContextInterface};
use Magento\Ui\Component\Listing\Columns\Column;

class IsActive extends Column
{
    /**
     * Class Constructor
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$items) {
                if ($items['is_active'] == 1) {
                    $items['is_active'] = 'Yes';
                } else {
                    $items['is_active'] = 'No';
                }
            }
        }
        return $dataSource;
    }
}