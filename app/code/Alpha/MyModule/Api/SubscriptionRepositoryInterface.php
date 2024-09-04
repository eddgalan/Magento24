<?php

namespace Alpha\MyModule\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Alpha\MyModule\Api\Data\SubscriptionInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

interface SubscriptionRepositoryInterface
{
    /**
     * @param SubscriptionInterface $subscription
     * @return SubscriptionInterface
     * @throws CouldNotSaveException
     */
    public function save(SubscriptionInterface $subscription) : SubscriptionInterface;

    /**
     * @param int $subscriptionId
     * @return SubscriptionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $subscriptionId) : SubscriptionInterface;

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria) : SearchResultsInterface;

    /**
     * @param SubscriptionInterface $subscription
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(SubscriptionInterface $subscription) : bool;

    /**
     * @param string $id
     * @return bool
     */
    public function deleteById(string $id) : bool;
}
