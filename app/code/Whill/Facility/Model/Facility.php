<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Model;

use Magento\Framework\Model\AbstractModel;
use Whill\Facility\Api\Data\FacilityInterface;

class Facility extends AbstractModel implements FacilityInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Whill\Facility\Model\ResourceModel\Facility::class);
    }

    /**
     * @inheritDoc
     */
    public function getFacilityId()
    {
        return $this->getData(self::FACILITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setFacilityId($facilityId)
    {
        return $this->setData(self::FACILITY_ID, $facilityId);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @inheritDoc
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritDoc
     */
    public function getLat()
    {
        return $this->getData(self::LAT);
    }

    /**
     * @inheritDoc
     */
    public function setLat($lat)
    {
        return $this->setData(self::LAT, $lat);
    }

    /**
     * @inheritDoc
     */
    public function getLong()
    {
        return $this->getData(self::LONG);
    }

    /**
     * @inheritDoc
     */
    public function setLong($long)
    {
        return $this->setData(self::LONG, $long);
    }
}

