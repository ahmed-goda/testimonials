<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\{Backend\App\Action,
            Backend\Model\View\Result\RedirectFactory,
            Framework\View\Result\PageFactory};
use Training\Testimonials\Model\Testimonial;


class Delete extends Action
{
    private $pageFactory;
    protected $model;
    protected $resultRedirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory,
        Testimonial $testimonial,
        PageFactory $pageFactory,
        Action\Context $context)
    {
        $this->resultRedirectFactory = $redirectFactory;
        $this->model = $testimonial;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Training_Testimonials::parent');
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $entityId = $this->getRequest()->getParam('id');
        if ($entityId) {
            $model = $this->model;
            $model->load($entityId);
            try {
                $model->delete();
                $this->messageManager->addSuccessMessage(__('Testimonial Deleted'));
                return $resultRedirect->setPath('*/*/index');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $resultRedirect->setPath('*/*/edit', ['id' => $entityId]);
            }
        }

        return $resultRedirect->setPath('*/*/index');
    }
}