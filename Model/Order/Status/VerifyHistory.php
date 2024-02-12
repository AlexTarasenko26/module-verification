<?php
declare(strict_types=1);
namespace Epam\Development\Model\Order\Status;

use Epam\Development\Api\Data\VerifyOrderStatusHistoryInterface;
use Magento\Sales\Model\Order\Status\History;

class VerifyHistory extends History implements VerifyOrderStatusHistoryInterface
{
    /**
     * @return int|null
     */
    public function getIsRequiresVerification()
    {
        return $this->getOrder()?->getRequireVerification();
    }

    /**
     * @param int $required
     * @return boolean
     */
    public function setIsRequiresVerification(int $required)
    {
        if ($this->getOrder()) {
            $this->getOrder()->setRequireVerification($required);
            return true;
        }
         return false;
    }
}
