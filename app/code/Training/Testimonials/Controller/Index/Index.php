<?php

namespace Training\Testimonials\Controller\Index;

use Magento\Framework\{App\Action\Context, App\Action\ResponseInterface, App\Action\Action, View\Result\PageFactory};
use Training\Testimonials\Model\{Testimonial, TestimonialFactory};

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
        return $this->pageFactory->create();
    }
}