<?php
declare(strict_types=1);

namespace Epam\Development\Ui\Component\Listing;

use Magento\Framework\Data\OptionSourceInterface;

class Options implements OptionSourceInterface
{
    const ATTR_OPTIONS = [
        ['label' => 'Default', 'value' => ''],
        ['label' => 'Yes', 'value' => 0],
        ['label' => 'No', 'value' => 1]
    ];

    /**
     * @return array[]
     */
    public function toOptionArray()
    {
        return self::ATTR_OPTIONS;
    }
}
