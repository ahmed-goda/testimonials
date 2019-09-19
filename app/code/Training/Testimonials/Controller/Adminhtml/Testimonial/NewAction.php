<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\{Backend\App\Action,
            Backend\Model\View\Result\ForwardFactory,
            Framework\View\Result\PageFactory};

class NewAction extends Action
{
    protected  $forwardFactory;
    private $pageFactory;
    
    public function __construct(
        PageFactory $pageFactory,
        ForwardFactory $forwardFactory,
        Action\Context $context)
    {
        $this->forwardFactory = $forwardFactory;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Testimonials::parent');
    }

    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Forward $resultForward */
        $resultForward = $this->forwardFactory->create();
        return $resultForward->forward('edit');
    }
}