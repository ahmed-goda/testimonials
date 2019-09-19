<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\{Backend\App\Action,
            Framework\View\Result\PageFactory};

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

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Testimonials::parent');
    }

    public function execute()
    {
        $resultPage = $this->pageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Testimonials')));
		return $resultPage;
    }
}