<?php
declare(strict_types=1);

namespace Epam\Development\Api;

use Epam\Development\Api\Data\OrderVerificationInterface;

interface OrderVerificationManagementInterface
{

    /**
     * Get verification status of the order
     * @param int $id - The order ID
     * @return string
     */
    public function getVerification(int $id);

    /**
     * @param OrderVerificationInterface[] $orderData
     * @return mixed
     */
    public function setOrderVerification(array $orderData);

}
