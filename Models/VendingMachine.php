<?php

namespace Models;

class VendingMachine implements VendingMachineInterface
{
    /**
     * List of products.
     *
     * @var ProductInterface[]
     */
    private array $products = [];

    /**
     * Current selected product.
     *
     * @var ?ProductInterface
     */
    private ?ProductInterface $selectedProduct = null;


    /**
     * User balance.
     *
     * @var float
     */
    private float $balance = 0;

    public function __construct(array $products = null)
    {
        if ($products !== null) {
            $this->products = $products;
        }
    }

    /**
     * @return ProductInterface[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param ProductInterface $product
     * @return bool
     */
    public function selectProduct(ProductInterface $product): bool
    {
        foreach ($this->products as $availableProduct) {
            if ($availableProduct->getId() === $product->getId()) {
                $this->selectedProduct = $product;

                return true;
            }
        }

        return false;
    }

    public function unSelectProduct(): void
    {
        $this->selectedProduct = null;
    }

    /**
     * @return ProductInterface|null
     */
    public function getSelectedProduct(): ProductInterface|null
    {
        return $this->selectedProduct;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return void
     */
    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * @param ProductInterface $product
     * @return void
     */
    public function addProduct(ProductInterface $product): void
    {
        $this->products[] = $product;
    }
}