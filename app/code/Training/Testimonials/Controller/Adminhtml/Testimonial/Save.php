<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\{Backend\App\Action,
            Backend\Model\View\Result\RedirectFactory,
            Framework\View\Result\PageFactory};
use Training\Testimonials\Model\Testimonial;

class Save extends Action
{
    protected $model;
    private $pageFactory;
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
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if($data) {
            $testimonial = $this->getRequest()->getParam('testimonial');
            if(array_key_exists('id', $testimonial)) {
                $entityId = $testimonial['id'];
                $model = $this->model->load($entityId);
            }
            $model = $this->model->setData($data['testimonial']);
        }

        try{
            $model->save();
            $this->messageManager->addSuccessMessage(__('Testimonial Saved Sucessfully'));
            $this->_getSession()->setFormData(false);
            if ($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' =>$model->getId(), '_current' => true]);
            }
            return $resultRedirect->setPath('*/*/index');

        }catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');
    }
}

