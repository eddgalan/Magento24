<?php

namespace Alpha\MyModule\Model\Config\Frontend;

use Magento\Framework\Data\Form\Element\AbstractElement;

class TimeField extends DateField
{
    /**
     * @inheirtDoc
     */
    public function render(AbstractElement $element): string
    {
        $element->setTimeFormat("HH:mm:ss");
        return parent::render($element);
    }
}
