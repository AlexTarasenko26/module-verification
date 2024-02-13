<?php
declare(strict_types=1);

namespace Epam\Development\Model;
use Magento\Framework\DataObject;
use Epam\Development\Api\Data\OrderVerificationInterface;

class OrderVerification extends DataObject implements OrderVerificationInterface
{

    /**
     * @return int
     */
    public function getRequireVerification(): int
    {
        return $this->_getData(OrderVerificationInterface::REQUIRE_VERIFICATION);
    }

    /**
     * @param int $verified
     * @return OrderVerification
     */
    public function setRequireVerification(int $verified)
    {
        return $this->setData(OrderVerificationInterface::REQUIRE_VERIFICATION, $verified);
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->_getData(OrderVerificationInterface::ENTITY_ID);
    }

    /**
     * @param int $id
     * @return OrderVerification
     */
    public function setEntityId(int $id)
    {
        return $this->setData(OrderVerificationInterface::ENTITY_ID, $id);
    }
}
