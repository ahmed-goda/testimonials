<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    private $pageFactory;

    public function __construct(
       PageFactory $pageFactory,
       Action\Context $context)
    {
       $this->pageFactory = $pageFactory;
       parent::__construct($context);
    }

    public function execute()
    {
        //return $this->pageFactory->create();
        $resultPage = $this->pageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Testimonials')));

		return $resultPage;
    }
}