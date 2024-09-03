<?php

namespace Alpha\MyModule\Model\Config\Frontend;

use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Stdlib\DateTime as StdlibDateTime;

class DateTimeField extends DateField
{
    /**
     * @inheirtDoc
     */
    public function render(AbstractElement $element): string
    {
        $element->setDateFormat(StdlibDateTime::DATE_INTERNAL_FORMAT);
        $element->setTimeFormat("HH:mm:ss");
        return parent::render($element);
    }
}
