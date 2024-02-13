<?php
declare(strict_types=1);

namespace Epam\Development\Api;

use Epam\Development\Api\Data\OrderVerificationInterface;
use Magento\Framework\Controller\Result\Json;
interface OrderVerificationManagementInterface
{

    /**
     * Get verification status of the order
     * @param int $id - The order ID
     * @return string
     */
    public function getVerification(int $id): string;

    /**
     * @param OrderVerificationInterface $orderData
     * @return Json
     */
    public function setOrderVerification(OrderVerificationInterface $orderData): Json;

}
