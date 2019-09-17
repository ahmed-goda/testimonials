<?php

namespace Training\Testimonials\Model;

use Magento\Framework\DataObject;
use Training\Testimonials\Api\TestimonialRepositoryInterface;
use Training\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory;
use Training\Testimonials\Model\TestimonialFactory;
use Training\Testimonials\Model\ResourceModel\Testimonial;
use Training\Testimonials\Api\Data\TestimonialSearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\SearchCriteriaInterface;

class TestimonialRepository implements TestimonialRepositoryInterface
{
    private $collectionFactory;
    private $testimonialFactory;
    private $testimonial;
    private $resultInterfaceFactory;
    private $collectionProcessor;

    /**
     * Class constructor.
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        TestimonialFactory $testimonialFactory,
        Testimonial $testimonial,
        TestimonialSearchResultInterfaceFactory $resultInterfaceFactory,
        CollectionProcessor $collectionProcessor
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->testimonialFactory = $testimonialFactory;
        $this->testimonial = $testimonial;
        $this->resultInterfaceFactory = $resultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     *
     * @param int $id
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function getTestimonialById(int $id)
    {
        return $this->testimonialFactory->create()->load($id);
    }

    /**
     *
     * @param \Training\Testimonials\Api\Data\TestimonialInterface $testimonial
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function saveTestimonial(\Training\Testimonials\Api\Data\TestimonialInterface $testimonial)
    {
        if ($testimonial->getId() == null) {
            $this->testimonial->save($testimonial);
            return $testimonial;
        }
    
        $newMember = $this->testimonialFactory->create()->load($testimonial->getId());
        foreach ($newMember->getData() as $key => $value) {
            $newMember->setData($key, $value);
        }
        $this->testimonial->save($newMember);
        return $newMember;
    }

    /**
     *
     * @param int $id
     * @return void
     */
    public function deleteTestimonialById(int $id)
    {
        $testimonial = $this->testimonialFactory->create()->load($id);
        $testimonial->delete();
    }

    /**
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return Training\Testimonials\Api\Data\TestimonialSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->testimonialFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->resultInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}