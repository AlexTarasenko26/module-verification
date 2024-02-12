<?php
declare(strict_types=1);

namespace Epam\Development\Api\Data;

interface VerifyOrderStatusHistoryInterface
{
    /**
     * @return int|null
     */
    public function getIsRequiresVerification();

    /**
     * @param int $required
     * @return boolean
     */
    public function setIsRequiresVerification(int $required);
}
