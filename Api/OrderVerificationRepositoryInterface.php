<?php
declare(strict_types=1);

namespace Epam\Development\Api;

use Epam\Development\Api\Data\OrderVerificationInterface;

interface OrderVerificationRepositoryInterface
{
    /**
     * @param OrderVerificationInterface $order
     * @return OrderVerificationInterface
     */
    public function save(OrderVerificationInterface $order);

    /**
     * Loads a specified order.
     *
     * @param int $id The order ID.
     * @return OrderVerificationInterface Order interface.
     */
    public function get($id);

    /**
     * @param OrderVerificationInterface $entity
     * @return mixed
     */
    public function delete(OrderVerificationInterface $entity);

}
