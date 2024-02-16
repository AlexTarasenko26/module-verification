<?php
declare(strict_types=1);

namespace Epam\Verification\Ui\Component\Listing\Column;

use Epam\Verification\Api\OrderVerificationRepositoryInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

class RequireVerification extends Column
{
    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param OrderVerificationRepositoryInterface $orderRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface                                      $context,
        UiComponentFactory                                    $uiComponentFactory,
        private readonly OrderVerificationRepositoryInterface $orderRepository,
        array                                                 $components = [],
        array                                                 $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $order = $this->orderRepository->get($item["entity_id"]);
                $requireVerification = $order->getData("require_verification");
                // Logic to retrieve data for the custom column
                $item['require_verification'] = $requireVerification > 0 ? "no" : "yes";
            }
        }

        return $dataSource;
    }
}
