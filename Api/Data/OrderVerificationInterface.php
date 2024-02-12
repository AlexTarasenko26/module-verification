<?php
declare(strict_types=1);

namespace Epam\Development\Api\Data;

use Magento\Sales\Api\Data\OrderInterface;

interface OrderVerificationInterface extends OrderInterface
{
    const REQUIRE_VERIFICATION = 'require_verification';

    /**
     * @return int|null
     */
    public function getRequireVerification();

    /**
     * @param int $verified
     * @return $this
     */
    public function setRequireVerification(int $verified);

}
