<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Whill\Facility\Model\ResourceModel\Facility;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'facility_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Whill\Facility\Model\Facility::class,
            \Whill\Facility\Model\ResourceModel\Facility::class
        );
    }
}

