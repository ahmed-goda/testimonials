<?php

namespace Training\Testimonials\Block\Adminhtml\Testimonial\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton implements ButtonProviderInterface
{

    public function getButtonData()
    {
       return [
           'label' => __('Save And Continue'),
           'class' => 'save',
           'sort_order' => 40
       ];
    }
}