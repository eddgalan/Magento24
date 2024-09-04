<?php

namespace Alpha\MyModule\Model\ResourceModel\Subscription;

use Alpha\MyModule\Model\Subscription;
use Alpha\MyModule\Model\ResourceModel\Subscription as SubscriptionResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(Subscription::class, SubscriptionResource::class);
    }
}
