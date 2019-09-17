<?php

namespace Training\Testimonials\Model\ResourceModel\Testimonial;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Training\Testimonials\Model\Testimonial;
use Training\Testimonials\Model\ResourceModel\Testimonial as TestimonialResource;

class Collection extends AbstractCollection
{

    protected function _construct()
    {
        parent::_construct();
        $this->_init(Testimonial::class, TestimonialResource::class);
    }
}