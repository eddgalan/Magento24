<?php

namespace Alpha\MyModule\Model;

use Alpha\MyModule\Api\Data\SubscriptionInterface;
use Alpha\MyModule\Api\SubscriptionRepositoryInterface;
use Alpha\MyModule\Model\ResourceModel\Subscription as ResourceModel;
use Alpha\MyModule\Api\Data\SubscriptionInterfaceFactory;
use Alpha\MyModule\Model\ResourceModel\Subscription\CollectionFactory as SubscriptionCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;
use Magento\Framework\Api\Search\SearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    protected ResourceModel $resource;

    protected SubscriptionInterfaceFactory $subscriptionFactory;

    protected SubscriptionCollectionFactory $collectionFactory;

    private CollectionProcessor $collectionProcessor;

    private SearchResultInterfaceFactory $searchResultInterfaceFactory;

    public function __construct(
        ResourceModel                   $resource,
        SubscriptionInterfaceFactory    $subscriptionFactory,
        SubscriptionCollectionFactory   $collectionFactory,
        CollectionProcessor             $collectionProcessor,
        SearchResultInterfaceFactory    $searchResultInterfaceFactory
    ) {
        $this->resource = $resource;
        $this->subscriptionFactory = $subscriptionFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultInterfaceFactory = $searchResultInterfaceFactory;
    }

    /**
     * @param SubscriptionInterface $subscription
     * @return SubscriptionInterface
     * @throws CouldNotSaveException
     */
    public function save(SubscriptionInterface $subscription): SubscriptionInterface
    {
        try {
            $this->resource->save($subscription);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__(
                'Could not save the log: %1',
                $e->getMessage()
            ));
        }
        return $subscription;
    }

    /**
     * @param int $subscriptionId
     * @return SubscriptionInterface
     * @throws NoSuchEntityException
     */
    public function get(int $subscriptionId) : SubscriptionInterface
    {
        $subscription = $this->subscriptionFactory->create();
        $this->resource->load($subscription, $subscriptionId);
        if ($subscription->getId()) {
            throw new NoSuchEntityException(__('Subscription with id "%1" does not exist.', $subscriptionId));
        }
        return $subscription;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria): SearchResultsInterface
    {
        $searchResults = $this->searchResultInterfaceFactory->create();
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @param SubscriptionInterface $subscription
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(SubscriptionInterface $subscription) : bool
    {
        try {
            $subscriptionModel = $this->subscriptionFactory->create();
            $this->resource->load($subscriptionModel, $subscription->getId());
            $this->resource->delete($subscriptionModel);
        } catch (Exception $e) {
            throw new CouldNotDeleteException(__(
                'Could not delete the subscription: %1',
                $e->getMessage()
            ));
        }
        return true;
    }

    /**
     * @param string $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(string $id) : bool
    {
        return $this->delete($this->get($id));
    }
}
