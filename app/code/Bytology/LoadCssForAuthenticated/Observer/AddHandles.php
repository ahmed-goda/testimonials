<?php

namespace Bytology\LoadCssForAuthenticated\Observer;

use Magento\Framework\Event\{Observer, ObserverInterface};
use Magento\Customer\Model\Session as CustomerSession;

/**
 * Class AddHandles
 */
class AddHandles implements ObserverInterface
{
    /** @var CustomerSession  */
    protected $customerSession;

    /**
     * AddHandles constructor.
     * @param CustomerSession $customerSession
     */
    public function __construct(CustomerSession $customerSession) {
        $this->customerSession = $customerSession;
    }

    /**
     * Determine if the customer is logged in and if so add a layout handle
     * @param Observer $observer
     */
    public function execute(Observer $observer)
    {
        $layout = $observer->getEvent()->getLayout();
        if ($this->customerSession->isLoggedIn()) {
            $layout->getUpdate()->addHandle('customer_logged_in');
        }
    }
}