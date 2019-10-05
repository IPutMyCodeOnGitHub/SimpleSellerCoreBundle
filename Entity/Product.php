<?php

declare(strict_types=1);

namespace SimpleSeller\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 */
class Product
{
    /**
     * @Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="bigint")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @var string
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string", length=1024)
     *
     * @var string
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", nullable=false)
     *
     * @var Category
     */
    protected $category;

    /**
     * @ORM\Column(name="photoUrl", type="string", length=1024, nullable=true)
     *
     * @var string
     */
    protected $photoUrl;

    /**
     * @ORM\Column(name="price", type="float", length=1024)
     *
     * @var float
     */
    protected $price;

    public function __construct(string $name, string $description, Category $category, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
    }

    public function setPhotoUrl(string $photoUrl): void
    {
        $this->photoUrl = $photoUrl;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
