<?php
declare(strict_types=1);

namespace Epam\Development\Model\Service;

use Epam\Development\Api\OrderVerificationManagementInterface;
use Epam\Development\Api\OrderVerificationRepositoryInterface;
use Epam\Development\Api\Data\OrderVerificationInterface;
class OrderVerificationService implements OrderVerificationManagementInterface
{

    /**
     * @param OrderVerificationRepositoryInterface $verificationRepository
     */
    public function __construct(
        private readonly OrderVerificationRepositoryInterface $verificationRepository
    )
    {
    }

    /**
     * @param int $id
     * @return string
     */
    public function getVerification(int $id): string
    {
        $order = $this->verificationRepository->get($id);
        if ($order->getEntityId() > 0) {
            return $order->getRequireVerification() > 0 ? "verified" : "not verified";
        }
        return "order not found";
    }

    /**
     * @param OrderVerificationInterface[] $orderData
     * @return bool
     */
    public function setOrderVerification(array $orderData): bool
    {
        foreach ($orderData as $data) {
            $order = $this->verificationRepository->get($data->getEntityId());
            if ($order->getEntityId() > 0) {
                $order->setRequireVerification($data->getRequireVerification());
                $this->verificationRepository->save($order);
                return true;
            }
        }
        return false;
    }
}
