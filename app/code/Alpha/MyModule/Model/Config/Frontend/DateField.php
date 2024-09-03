<?php

namespace Alpha\MyModule\Model\Config\Frontend;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime as StdlibDateTime;

class DateField extends Field
{
    /**
     * @var Registry
     */
    protected Registry $_coreRegistry;

    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param array $data
     */
    public function __construct(
        Context  $context,
        Registry $coreRegistry,
        array    $data = []
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element): string
    {
        $element->setDateFormat(StdlibDateTime::DATE_INTERNAL_FORMAT);
        return parent::render($element);
    }
}
