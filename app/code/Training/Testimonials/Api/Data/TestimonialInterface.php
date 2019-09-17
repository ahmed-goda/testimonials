<?php

namespace Training\Testimonials\Api\Data;

interface TestimonialInterface
{
    const ID = 'id';
    const FULL_NAME = 'full_name';
    const TESTIMONIAL_TEXT = 'testimonial_text';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     *
     * @return int
     */
    public function getId();
    
    /**
     *
     * @return string
     */
    public function getFullName();
    
    /**
     *
     * @return string
     */
    public function getTestimonialText();
    
    /**
     *
     * @return string
     */
    public function getCreatedAt();
    
    /**
     *
     * @return string
     */
    public function getUpdatedAt();
    
    /**
     *
     * @param string $fullName
     * 
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function setFullName(string $fullName);
    
    /**
     *
     * @param string $testimonialText
     * 
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function setTestimonialText(string $testimonialText);
}
