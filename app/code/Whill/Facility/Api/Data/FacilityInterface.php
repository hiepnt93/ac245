<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Api\Data;

interface FacilityInterface
{

    const NAME = 'name';
    const LONG = 'long';
    const LAT = 'lat';
    const FACILITY_ID = 'facility_id';

    /**
     * Get facility_id
     * @return string|null
     */
    public function getFacilityId();

    /**
     * Set facility_id
     * @param string $facilityId
     * @return \Whill\Facility\Facility\Api\Data\FacilityInterface
     */
    public function setFacilityId($facilityId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Whill\Facility\Facility\Api\Data\FacilityInterface
     */
    public function setName($name);

    /**
     * Get lat
     * @return string|null
     */
    public function getLat();

    /**
     * Set lat
     * @param string $lat
     * @return \Whill\Facility\Facility\Api\Data\FacilityInterface
     */
    public function setLat($lat);

    /**
     * Get long
     * @return string|null
     */
    public function getLong();

    /**
     * Set long
     * @param string $long
     * @return \Whill\Facility\Facility\Api\Data\FacilityInterface
     */
    public function setLong($long);
}

