<?php
declare(strict_types=1);

namespace Epam\Development\Model\ResourceModel\Order;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Verification extends AbstractDb
{
    private const TABLE_NAME = 'sales_order';
    private const PRIMARY_KEY = 'entity_id';

    protected function _construct()
    {
        $this->_init(self::TABLE_NAME, self::PRIMARY_KEY);
    }
}
