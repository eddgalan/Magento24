<?php

namespace Alpha\MyModule\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Subscription extends AbstractDb
{
    /**
     * @return void
     */
    public function _construct(): void
    {
        $this->_init('alpha_mymodule_subscriptions', 'id');
    }
}
