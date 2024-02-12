<?php
declare(strict_types=1);

namespace Epam\Development\Model;

use Magento\Sales\Model\Order;
use Epam\Development\Api\Data\OrderVerificationInterface;

class OrderVerification extends Order implements OrderVerificationInterface
{

    /**
     * @return int|null
     */
    public function getRequireVerification()
    {
        return $this->getData(OrderVerificationInterface::REQUIRE_VERIFICATION);
    }

    /**
     * @param int $verified
     * @return OrderVerification
     */
    public function setRequireVerification(int $verified)
    {
        return $this->setData(OrderVerificationInterface::REQUIRE_VERIFICATION, $verified);
    }
}
