<?php

namespace Alpha\MyModule\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class MultiSelect implements OptionSourceInterface
{
    /**
     * @return array[]
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'option1', 'label' => __('Option 1')],
            ['value' => 'option2', 'label' => __('Option 2')],
            ['value' => 'option3', 'label' => __('Option 3')],
        ];
    }
}

