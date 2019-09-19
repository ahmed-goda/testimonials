<?php

namespace Training\Testimonials\Model;

use Magento\Framework\{DataObject,
                        Api\SearchCriteria\CollectionProcessor,
                        Api\SearchCriteriaInterface};
use Training\Testimonials\{Api\TestimonialRepositoryInterface,
                            Api\Data\TestimonialSearchResultInterfaceFactory,
                            Model\ResourceModel\Testimonial\CollectionFactory,
                            Model\TestimonialFactory,
                            Model\ResourceModel\Testimonial};

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
     * @param TestimonialFactory $testimonialFactory
     * @param Testimonial $testimonial
     * @param TestimonialSearchResultInterfaceFactory $resultInterfaceFactory
     * @param CollectionProcessor $collectionProcessor
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
     * @param int $entityId
     * @return \Training\Testimonials\Api\Data\TestimonialInterface
     */
    public function getTestimonialById(int $entityId)
    {
        return $this->testimonialFactory->create()->load($entityId);
    }

    /**
     *
     * @param \Training\Testimonials\Api\Data\TestimonialInterface $testimonial
     * 
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
     * @param int $entityId
     * @return void
     */
    public function deleteTestimonialById(int $entityId)
    {
        $testimonial = $this->testimonialFactory->create()->load($entityId);
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