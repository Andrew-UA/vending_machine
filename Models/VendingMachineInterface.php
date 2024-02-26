<?php

namespace Models;

interface VendingMachineInterface
{
    /**
     * @return ProductInterface[]
     */
    public function getProducts(): array;

    /**
     * @param ProductInterface $product
     * @return void
     */
    public function addProduct(ProductInterface $product): void;

    /**
     * @param ProductInterface $product
     * @return bool
     */
    public function selectProduct(ProductInterface $product): bool;

    /**
     * @return void
     */
    public function unSelectProduct(): void;

    /**
     * @return ProductInterface|null
     */
    public function getSelectedProduct(): ProductInterface|null;

    /**
     * @return float
     */
    public function getBalance(): float;

    /**
     * @param float $balance
     * @return void
     */
    public function setBalance(float $balance): void;
}