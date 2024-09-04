<?php

namespace Alpha\MyModule\Model;

use Alpha\MyModule\Api\Data\SubscriptionInterface;
use Alpha\MyModule\Model\ResourceModel\Subscription as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class Subscription extends AbstractModel implements SubscriptionInterface
{
    /**
     * @return void
     */
    public function _construct(): void
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->getData(self::ID);
    }

    /**
     * @param $value
     * @return SubscriptionInterface
     */
    public function setId($value) : SubscriptionInterface
    {
        return $this->setData(self::ID, $value);
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->getData(self::FIRSTNAME);
    }

    /**
     * @param string|null $firstname
     * @return SubscriptionInterface
     */
    public function setFirstname(?string $firstname) : SubscriptionInterface
    {
        return $this->setData(self::FIRSTNAME, $firstname);
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->getData(self::LASTNAME);
    }

    /**
     * @param string|null $lastname
     * @return SubscriptionInterface
     */
    public function setLastname(?string $lastname) : SubscriptionInterface
    {
        return $this->setData(self::LASTNAME, $lastname);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * @param string|null $email
     * @return SubscriptionInterface
     */
    public function setEmail(?string $email) : SubscriptionInterface
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @param string|null $status
     * @return SubscriptionInterface
     */
    public function setStatus(?string $status) : SubscriptionInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @return string|null
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->getData(self::UPDATED_AT);
    }
}
