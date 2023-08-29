<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface FacilityRepositoryInterface
{

    /**
     * Save Facility
     * @param \Whill\Facility\Api\Data\FacilityInterface $facility
     * @return \Whill\Facility\Api\Data\FacilityInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Whill\Facility\Api\Data\FacilityInterface $facility
    );

    /**
     * Retrieve Facility
     * @param string $facilityId
     * @return \Whill\Facility\Api\Data\FacilityInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($facilityId);

    /**
     * Retrieve Facility matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Whill\Facility\Api\Data\FacilitySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Facility
     * @param \Whill\Facility\Api\Data\FacilityInterface $facility
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Whill\Facility\Api\Data\FacilityInterface $facility
    );

    /**
     * Delete Facility by ID
     * @param string $facilityId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($facilityId);
}

