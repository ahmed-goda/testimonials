<?php

namespace Training\Testimonials\Block;

use \Magento\Framework\View\Element\Template;
use Training\Testimonials\Model\TestimonialFactory;

class DisplayTestimonials extends Template
{

    protected $testimonialsFactory;
    
	public function __construct(Template\Context $context, TestimonialFactory $testimonialsFactory)
	{
		$this->testimonialsFactory = $testimonialsFactory;
		parent::__construct($context);
	}

	public function getTestimonialsCollection(){
		$testimonials = $this->testimonialsFactory->create();
		return $testimonials->getCollection()->setOrder(
            'created_at',
            'desc'
        );
	}
}