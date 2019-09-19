<?php

namespace Training\Testimonials\Controller\Adminhtml\Testimonial;

use Magento\{Backend\App\Action,
            Backend\Model\View\Result\RedirectFactory,
            Ui\Component\MassAction\Filter};
use Training\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;

class MassDelete extends Action
{
    protected $filter;
    protected $collectionFactory;
    protected  $resultRedirectFactory;

    public function __construct(
        Filter $filter,
        CollectionFactory $collectionFactory,
        RedirectFactory $resultRedirectFactory,
        Action\Context $context
    )
    {

        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection =  $this->filter->getCollection($this->collectionFactory->create());
        $size = $collection->getSize();
        
        foreach ($collection as $item) {
            $item->delete();
        }

        $this->messageManager->addSuccessMessage(__('A total of ' .$size. ' have been deleted' ));
       $resultRedirect = $this->resultRedirectFactory->create();

       return $resultRedirect->setPath('*/*/index');
    }
}