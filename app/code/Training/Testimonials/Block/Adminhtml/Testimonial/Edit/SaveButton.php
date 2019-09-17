<?php

namespace Training\Testimonials\Block\Adminhtml\Testimonial\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
        return [
            'label' => __('Save Testimonial'),
            'class' => 'save primary',
            'sort_order' => 50
        ];
    }
}