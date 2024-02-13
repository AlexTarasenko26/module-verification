<?php
declare(strict_types=1);

namespace Epam\Development\Api\Data;

interface OrderVerificationInterface
{
    const REQUIRE_VERIFICATION = 'require_verification';
    const ENTITY_ID = 'entity_id';

    /**
     * @return int
     */
    public function getRequireVerification(): int;

    /**
     * @param int $verified
     * @return $this
     */
    public function setRequireVerification(int $verified);

    /**
     * @return int
     */
    public function getEntityId(): int;


    /**
     * @param int $id
     * @return $this
     */
    public function setEntityId(int $id);

}
