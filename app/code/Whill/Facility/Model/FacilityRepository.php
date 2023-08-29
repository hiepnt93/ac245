<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Model;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Whill\Facility\Api\Data\FacilityInterface;
use Whill\Facility\Api\Data\FacilityInterfaceFactory;
use Whill\Facility\Api\Data\FacilitySearchResultsInterfaceFactory;
use Whill\Facility\Api\FacilityRepositoryInterface;
use Whill\Facility\Model\ResourceModel\Facility as ResourceFacility;
use Whill\Facility\Model\ResourceModel\Facility\CollectionFactory as FacilityCollectionFactory;

class FacilityRepository implements FacilityRepositoryInterface
{

    /**
     * @var Facility
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var ResourceFacility
     */
    protected $resource;

    /**
     * @var FacilityInterfaceFactory
     */
    protected $facilityFactory;

    /**
     * @var FacilityCollectionFactory
     */
    protected $facilityCollectionFactory;


    /**
     * @param ResourceFacility $resource
     * @param FacilityInterfaceFactory $facilityFactory
     * @param FacilityCollectionFactory $facilityCollectionFactory
     * @param FacilitySearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceFacility $resource,
        FacilityInterfaceFactory $facilityFactory,
        FacilityCollectionFactory $facilityCollectionFactory,
        FacilitySearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->facilityFactory = $facilityFactory;
        $this->facilityCollectionFactory = $facilityCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(FacilityInterface $facility)
    {
        try {
            $this->resource->save($facility);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the facility: %1',
                $exception->getMessage()
            ));
        }
        return $facility;
    }

    /**
     * @inheritDoc
     */
    public function get($facilityId)
    {
        $facility = $this->facilityFactory->create();
        $this->resource->load($facility, $facilityId);
        if (!$facility->getId()) {
            throw new NoSuchEntityException(__('Facility with id "%1" does not exist.', $facilityId));
        }
        return $facility;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->facilityCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(FacilityInterface $facility)
    {
        try {
            $facilityModel = $this->facilityFactory->create();
            $this->resource->load($facilityModel, $facility->getFacilityId());
            $this->resource->delete($facilityModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Facility: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($facilityId)
    {
        return $this->delete($this->get($facilityId));
    }
}

