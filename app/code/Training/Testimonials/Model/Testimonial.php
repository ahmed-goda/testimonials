<?php

namespace Training\Testimonials\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Training\Testimonials\Model\ResourceModel\Testimonial as TestimonialResource;
use Training\Testimonials\Api\Data\TestimonialInterface;

class Testimonial extends AbstractExtensibleModel implements TestimonialInterface
{

    /**
     * Class constructor.
     */
    protected function _construct()
    {
        $this->_init(TestimonialResource::class);
    }

    /**
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(TestimonialInterface::ID);
    }
    
    /**
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->getData(TestimonialInterface::FULL_NAME);
    }
    
    /**
     *
     * @return string
     */
    public function getTestimonialText()
    {
        return $this->getData(TestimonialInterface::TESTIMONIAL_TEXT);
    }
    
    /**
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(TestimonialInterface::CREATED_AT);
    }
    
    /**
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(TestimonialInterface::UPDATED_AT);
    }
    
    /**
     *
     * @param string $fullName
     */
    public function setFullName(string $fullName)
    {
        return $this->setData(TestimonialInterface::FULL_NAME, $fullName);
    }

    /**
     *
     * @param string $testimonialText
     * 
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function setTestimonialText(string $testimonialText)
    {
        return $this->setData(TestimonialInterface::TESTIMONIAL_TEXT, $testimonialText);
    }
}