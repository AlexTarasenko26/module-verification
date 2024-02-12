<?php
declare(strict_types=1);

namespace Epam\Development\ViewModel;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Sales\Model\ResourceModel\Order\CollectionFactory;

class OrderVerification implements ArgumentInterface
{

    /**
     * @param RequestInterface $request
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        private readonly RequestInterface  $request,
        private readonly CollectionFactory $collectionFactory,
    )
    {
    }

    /**
     * @return DataObject
     */
    public function getOrder()
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('entity_id', (int)$this->request->getParam('order_id'));
        return $collection->getFirstItem();
    }

    /**
     * @return bool
     */
    public function isVerified()
    {
        return $this->getOrder()->getData('require_verification') > 0;
    }
}
