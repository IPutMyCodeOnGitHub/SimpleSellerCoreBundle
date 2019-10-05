<?php

declare(strict_types=1);

namespace SimpleSeller\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 */
class Order
{
    /**
     * @Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="bigint")
     *
     * * @var int
     */
    protected $id;

    /**
     * @ORM\Column(name="address", type="string", length=1024)
     *
     * @var string
     */
    protected $address;

    /**
     * @ORM\Column(name="phone_number", type="string", length=255)
     *
     * @var string
     */
    protected $phoneNumber;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     *
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="status", type="integer")
     *
     * @var int
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="SimpleSeller\CoreBundle\Entity\CustomerInterface")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     *
     * @var CustomerInterface
     */
    protected $customer;

    /**
     * Have to be defined in inherited class
     *
     * @var ArrayCollection|OrderItem[]
     */
    protected $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getCustomer(): CustomerInterface
    {
        return $this->customer;
    }

    public function setCustomer(CustomerInterface $customer): void
    {
        $this->customer = $customer;
    }
}
