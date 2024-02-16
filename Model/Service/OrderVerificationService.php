<?php
declare(strict_types=1);

namespace Epam\Verification\Model\Service;

use Epam\Verification\Api\OrderVerificationManagementInterface;
use Epam\Verification\Api\OrderVerificationRepositoryInterface;
use Epam\Verification\Api\Data\OrderVerificationInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\Result\Json;

class OrderVerificationService implements OrderVerificationManagementInterface
{

    /**
     * @param OrderVerificationRepositoryInterface $verificationRepository
     * @param ResultFactory $resultFactory
     */
    public function __construct(
        private readonly OrderVerificationRepositoryInterface $verificationRepository,
        private readonly ResultFactory                        $resultFactory
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
     * @param OrderVerificationInterface $orderData
     * @return Json
     */
    public function setOrderVerification(OrderVerificationInterface $orderData): Json
    {
        /** @var Json $resultJson */
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $responseCode = 200;

        $order = $this->verificationRepository->get($orderData["entity_id"]);
        if ($order->getEntityId() > 0) {
            $order->setRequireVerification($orderData["require_verification"]);
            $this->verificationRepository->save($order);
            $resultJson->setHttpResponseCode($responseCode);
            $resultJson->setData([
                "success" => true,
                "message" => "verification updated"
            ]);
            return $resultJson;
        }

        $responseCode = 500;
        $resultJson->setHttpResponseCode($responseCode);
        $resultJson->setData([
            "success" => true,
            "message" => $orderData['order_data']
        ]);
        return $resultJson;
    }
}
