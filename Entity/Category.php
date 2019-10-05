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
class Category
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
     * Have to be defined in inherited class
     *
     * @var array|Product[]
     */
    protected $products;

    /**
     * @ORM\Column(name="photoUrl", type="string", length=1024, nullable=true)
     *
     * @var string
     */
    protected $photoUrl;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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
     * @return array|Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
    }

    public function setPhotoUrl(string $photoUrl): void
    {
        $this->photoUrl = $photoUrl;
    }
}
