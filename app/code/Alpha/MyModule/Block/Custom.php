<?php

namespace Alpha\MyModule\Block;

use Magento\Framework\View\Element\Template;

class Custom extends Template
{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }
}
