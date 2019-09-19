<?php

namespace Training\Testimonials\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\ResponseInterface;
use Magento\Framework\App\Action\Action;
use Training\Testimonials\Model\Testimonial;
use Training\Testimonials\Model\TestimonialFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $testimonialFactory;
    protected $pageFactory;

    /**
     * Class constructor.
     */
    public function __construct(
        Context $context,
        TestimonialFactory $testimonialFactory,
        PageFactory $pageFactory
    )
    {
        $this->testimonial = $testimonialFactory;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $testimonial = $this->testimonial->create();
        return $this->pageFactory->create();
    }
}