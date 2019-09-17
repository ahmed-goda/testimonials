<?php

namespace Training\Testimonials\Block\Adminhtml\Testimonial\Edit;


use Magento\Framework\Registry;
use Training\Testimonials\Model\Testimonial;

class Generic
{
    protected $urlBuilder;

    protected $registry;

    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId() {
        /** @var Testimonial $testimonial */
        $testimonial = $this->registry->registry('testimonial');
        return $testimonial ? $testimonial->getId() : null;
    }

    public function getUrl($route='', $param=[]) {
       return $this->urlBuilder->getUrl($route, $param);
    }

}