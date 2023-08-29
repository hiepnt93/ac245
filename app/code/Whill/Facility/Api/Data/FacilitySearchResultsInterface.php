<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Api\Data;

interface FacilitySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Facility list.
     * @return \Whill\Facility\Api\Data\FacilityInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Whill\Facility\Api\Data\FacilityInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

