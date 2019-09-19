<?php

namespace Training\Testimonials\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDB;

class Testimonial extends AbstractDB
{

    protected function _construct()
    {
        $this->_init('testimonials', 'id');
    }
}