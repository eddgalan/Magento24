<?php

namespace Alpha\MyModule\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Subscription extends Container
{
    protected function _construct(): void
    {
        $this->_blockGroup = "Alpha_MyModule";
        $this->_controller = "adminhtml_subscription";
        parent::_construct();
    }
}
