<?php

namespace Models;

class Product implements ProductInterface
{

    private string $id;
    public function __construct(private string $name, private float $price)
    {
        $this->id = uniqid();
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return void
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getStringPrice(): string
    {
        return sprintf('%.2f', $this->price);
    }
}