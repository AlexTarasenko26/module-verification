<?php
declare(strict_types=1);

namespace Epam\Verification\Model;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Model\OrderRepository;
use Epam\Verification\Api\Data\OrderVerificationInterface;
use Epam\Verification\Api\OrderVerificationRepositoryInterface;
use Magento\Sales\Api\Data\OrderInterface;

class OrderVerificationRepository implements OrderVerificationRepositoryInterface
{

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(
        private readonly OrderRepository $orderRepository
    )
    {
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return OrderSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        return $this->orderRepository->getList($searchCriteria);
    }

    /**
     * @param OrderInterface|OrderVerificationInterface $order
     * @return OrderVerificationInterface|OrderInterface
     * @throws AlreadyExistsException
     * @throws InputException
     * @throws NoSuchEntityException
     */
    public function save(OrderInterface|OrderVerificationInterface $order)
    {
        return $this->orderRepository->save($order);
    }

    /**
     * @param $id
     * @return OrderVerificationInterface|OrderInterface
     * @throws InputException
     * @throws NoSuchEntityException
     */
    public function get($id)
    {
        return $this->orderRepository->get($id);
    }

    /**
     * @param OrderInterface|OrderVerificationInterface $entity
     * @return bool|mixed
     */
    public function delete(OrderInterface|OrderVerificationInterface $entity)
    {
        return $this->orderRepository->delete($entity);
    }
}
