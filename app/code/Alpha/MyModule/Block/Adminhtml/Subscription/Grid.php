<?php

namespace Alpha\MyModule\Block\Adminhtml\Subscription;

use Magento\Backend\Block\Widget\Grid as WidgetGrid;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data as BackendHelper;
//use Alpha\MyModule\Model\ResourceModel\Subscription\Collection;
use Magento\Backend\Block\Widget\Grid\Extended;

class Grid extends Extended
{

    protected $_subscriptionCollection;

    public function __construct(
        Context $context,
        BackendHelper $backendHelper,
        //Collection $subscriptionCollection,
        array $data = []
    ) {
        //$this->_subscriptionCollection = $subscriptionCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No subscriptions found'));
    }

    /**
     * @return Grid
     */
    protected function _prepareCollection(): WidgetGrid
    {
        //$this->setCollection($this->_subscriptionCollection);
        return parent::_prepareCollection();
    }
}
