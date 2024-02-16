<?php
declare(strict_types=1);

namespace Epam\Verification\Controller\Adminhtml\Order;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Api\OrderManagementInterface;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class Verify extends Action
{
    protected CollectionFactory $collectionFactory;
    protected OrderManagementInterface $orderManagement;

    protected Filter $filter;

    /**
     * Verify constructor.
     *
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param OrderManagementInterface $orderManagement
     */
    public function __construct(
        Context                  $context,
        Filter                   $filter,
        CollectionFactory        $collectionFactory,
        OrderManagementInterface $orderManagement
    )
    {
        parent::__construct($context);
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->orderManagement = $orderManagement;
    }

    /**
     * @return Redirect
     * @throws LocalizedException
     */
    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        foreach ($collection as $order) {
            if ($order->getStatus() == 'pending') {
                $order->setRequireVerification(1)->save();
            }
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath($this->getComponentRefererUrl());
        return $resultRedirect;
    }

    /**
     * @return string
     */
    private function getComponentRefererUrl(): string
    {
        return $this->filter->getComponentRefererUrl()?: 'sales/order/index';
    }
}
