<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Facility extends AbstractDb
{

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init('whill_facility_facility', 'facility_id');
    }
}

