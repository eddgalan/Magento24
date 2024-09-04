<?php

namespace Alpha\MyModule\Api\Data;

interface SubscriptionInterface
{
    const ID = 'id';
    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const EMAIL = 'email';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DECLINED = 'declined';

    /**
     * Getter method for Id property
     *
     * @return string|null
     */
    public function getId() : ?string;

    /**
     * Setter method for Id property
     *
     * @param int $value
     * @return SubscriptionInterface
     */
    public function setId(int $value) : SubscriptionInterface;

    /**
     * Getter method for Firstname property
     *
     * @return string|null
     */
    public function getFirstname() : ?string;

    /**
     * Setter method for Firstname property
     *
     * @param string $firstname
     * @return SubscriptionInterface
     */
    public function setFirstname(string $firstname) : SubscriptionInterface;

    /**
     * Getter method for Lastname property
     *
     * @return string|null
     */
    public function getLastname() : ?string;

    /**
     * Setter method for Lastname property
     *
     * @param string $lastname
     * @return SubscriptionInterface
     */
    public function setLastname(string $lastname) : SubscriptionInterface;

    /**
     * Getter method for Email property
     *
     * @return string|null
     */
    public function getEmail() : ?string;

    /**
     * Setter method for Email property
     *
     * @param string $email
     * @return SubscriptionInterface
     */
    public function setEmail(string $email) : SubscriptionInterface;

    /**
     * Getter method for Status property
     *
     * @return string|null
     */
    public function getStatus() : ?string;

    /**
     * Setter method for Status property
     *
     * @param string $status
     * @return SubscriptionInterface
     */
    public function setStatus(string $status) : SubscriptionInterface;

    /**
     * Getter method for Created At property
     *
     * @return string|null
     */
    public function getCreatedAt() : ?string;

    /**
     * Getter method for Updated At property
     *
     * @return string|null
     */
    public function getUpdatedAt() : ?string;
}
