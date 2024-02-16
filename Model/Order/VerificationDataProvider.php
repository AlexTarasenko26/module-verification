<?php
declare(strict_types=1);

namespace Epam\Verification\Model\Order;

use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;

class VerificationDataProvider extends DataProvider
{
    /**
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();
        // Modify data array to include custom column
        foreach ($data['items'] as &$item) {
            $item['require_verification'] = $item->getRequireVerification();
        }
        return $data;
    }

}
