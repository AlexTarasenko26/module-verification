<?php
declare(strict_types=1);

namespace Epam\Development\Model;

use Magento\Sales\Model\OrderRepository;
use Epam\Development\Api\Data\OrderVerificationInterface;
use Epam\Development\Api\OrderVerificationRepositoryInterface;
use Magento\Sales\Api\Data\OrderInterface;

class OrderVerificationRepository implements OrderVerificationRepositoryInterface
{

    public function __construct(
        private readonly OrderRepository $orderRepository
    )
    {
    }

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        return $this->orderRepository->getList($searchCriteria);
    }

    public function save(OrderInterface|OrderVerificationInterface $order)
    {
        return $this->orderRepository->save($order);
    }

    public function get($id)
    {
        return $this->orderRepository->get($id);
    }

    public function delete(OrderInterface|OrderVerificationInterface $entity)
    {
        return $this->orderRepository->delete($entity);
    }
}
