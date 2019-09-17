<?php

namespace Training\Testimonials\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TestimonialRepositoryInterface
{
    /**
     *
     * @return \Training\Testimonials\Api\Data\TestimonialInterface[]
     */
    public function getList();
    
    /**
     *
     * @param int $id
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function getTestimonialById(int $id);
    
    /**
     *
     * @param \Training\Testimonials\Api\Data\TestimonialInterface $testimonial
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function saveTestimonial(\Training\Testimonials\Api\Data\TestimonialInterface $testimonial);

    /**
     *
     * @param int $id
     * @return void
     */
    public function deleteTestimonialById(int $id);

    /**
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return Training\Testimonials\Api\Data\TestimonialSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteriaInterface $searchCriteria);
}
