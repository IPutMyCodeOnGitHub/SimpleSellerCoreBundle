<?php

declare(strict_types=1);

namespace SimpleSeller\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 */
class OrderItem
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
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="items")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false)
     *
     * @var Order
     */
    protected $order;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id", nullable=false)
     *
     * @var Product
     */
    protected $product;

    /**
     * @ORM\Column(name="price", type="float")
     *
     * @var float
     */
    protected $price;

    /**
     * @ORM\Column(name="quantity", type="integer")
     *
     * @var int
     */
    protected $quantity;

    public function __construct(Order $order, Product $product, float $price, int $quantity)
    {
        $this->product = $product;
        $this->order = $order;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
