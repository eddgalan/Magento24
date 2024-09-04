<?php

namespace Alpha\MyModule\Block\Adminhtml\Subscription;

use Magento\Backend\Block\Widget\Grid as WidgetGrid;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Helper\Data as BackendHelper;
use Alpha\MyModule\Model\ResourceModel\Subscription\Collection;
use Alpha\MyModule\Api\Data\SubscriptionInterface;
use Magento\Backend\Block\Widget\Grid\Extended;

class Grid extends Extended
{
    /**
     * @var array
     */
    private array $statusClasses = [
        SubscriptionInterface::STATUS_PENDING => 'grid-severity-minor',
        SubscriptionInterface::STATUS_APPROVED => 'grid-severity-notice',
        SubscriptionInterface::STATUS_DECLINED => 'grid-severity-critical'
    ];

    /**
     * @var Collection
     */
    protected Collection $_subscriptionCollection;

    /**
     * @param Context $context
     * @param BackendHelper $backendHelper
     * @param Collection $subscriptionCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        BackendHelper $backendHelper,
        Collection $subscriptionCollection,
        array $data = []
    ) {
        $this->_subscriptionCollection = $subscriptionCollection;
        parent::__construct($context, $backendHelper, $data);
        $this->setEmptyText(__('No subscriptions found'));
    }

    /**
     * @return Grid
     */
    protected function _prepareCollection(): WidgetGrid
    {
        $this->setCollection($this->_subscriptionCollection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn(
            'id',
            [
                'header' => __('ID'),
                'index' => 'id',
                'type' => 'number',
                'align' => 'center',
                // 'width' => '50px',
                // 'filter' => false,
                // 'sortable' => false,
            ]
        );
        $this->addColumn(
            'firstname',
            [
                'header' => __('Firstname'),
                'index' => 'firstname',
                'type' => 'text',
                'align' => 'left'
            ]
        );
        $this->addColumn(
            'lastname',
            [
                'header' => __('Lastname'),
                'index' => 'lastname',
                'type' => 'text',
                'align' => 'left'
            ]
        );
        $this->addColumn(
            'email',
            [
                'header' => __('Email'),
                'index' => 'email',
                'type' => 'text',
                'align' => 'left'
            ]
        );
        $this->addColumn(
            'status',
            [
                'header' => __('Status'),
                'index' => 'status',
                'frame_callback' => [$this, 'renderStatus'],
            ]
        );
        $this->addColumn(
            'created_at',
            [
                'header' => __('Created At'),
                'index' => 'created_at',
                'type' => 'datetime',
                'align' => 'center',
            ]
        );
        $this->addColumn(
            'updated_at',
            [
                'header' => __('Updated At'),
                'index' => 'updated_at',
                'type' => 'datetime',
                'align' => 'center',
            ]
        );
        return $this;
        //return parent::_prepareColumns();
    }

    /**
     * @param $value
     * @return string
     */
    public function renderStatus($value): string
    {
        $class = array_key_exists($value, $this->statusClasses) ? $this->statusClasses[$value] : 'grid-severity-critical';
        return "<span class='$class'><span>$value</span></span>";
    }
}
