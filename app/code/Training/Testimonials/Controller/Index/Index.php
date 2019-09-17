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
        // $testimonial = $testimonial->load(4);
        // $testimonial->setAddress('New Address');
        // $testimonial->save();
        // var_dump($testimonial->getData());
        // $testimonial->delete();

        // $new_testimonial = $this->testimonial->create()->addData([
        //     'name'=>'Rand',
        //     'address'=>'a new address',
        //     'status'=>true,
        //     'phone_number'=>'987456948',
        // ]);
        // $new_testimonial->save();

        $collection = $testimonial->getCollection()->setOrder(
            'created_at',
            'asc'
        );
        return $this->pageFactory->create();
    }
}