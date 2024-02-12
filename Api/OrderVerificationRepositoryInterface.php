<?php
declare(strict_types=1);

namespace Epam\Development\Api;

use Epam\Development\Api\Data\OrderVerificationInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

interface OrderVerificationRepositoryInterface extends OrderRepositoryInterface
{
    /**
     * @param OrderVerificationInterface|OrderInterface $order
     * @return OrderVerificationInterface
     */
    public function save(OrderVerificationInterface|OrderInterface $order);

    /**
     * Loads a specified order.
     *
     * @param int $id The order ID.
     * @return OrderVerificationInterface|OrderInterface Order interface.
     */
    public function get($id);

    /**
     * @param OrderVerificationInterface|OrderInterface $entity
     * @return mixed
     */
    public function delete(OrderVerificationInterface|OrderInterface $entity);

}
