<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Training\Testimonials\Model\Testimonial;

class Edit extends Action
{
    private $pageFactory;
    protected $testimonial;
    protected $registry;

    public function __construct(
        PageFactory $pageFactory,
        Testimonial $testimonial,
        Registry $registry,
        Action\Context $context)
    {
        $this->testimonial = $testimonial;
        $this->pageFactory = $pageFactory;
        $this->registry = $registry;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Testimonials::parent');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $testimonial = $this->testimonial;

        if($id) {
            $testimonial->load($id);
            
            if(!$testimonial->getId()) {
                $this->messageManager->addErrorMessage(__('This Testimonial does not exists'));

                $result = $this->resultRedirectFactory->create();
                return $result->setPath("testimonials/testimonial/index");
            }
        }

        $data = $this->_getSession()->getFormData(true);

        if(!empty($data)) {
            $testimonial->setData($data);
        }

        $this->registry->register('testimonial', $testimonial);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();

        $resultPage->addHandle('testimonials_form');

        $resultPage->addBreadcrumb(
            $id ? __('Edit Testimonial') : __('Add a New Testimonial'),
            $id ? __('Edit Testimonial') : __('Add a New Testimonial')
        );
        if($id) {
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        } else {
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }
        return $this->pageFactory->create();
    }
}