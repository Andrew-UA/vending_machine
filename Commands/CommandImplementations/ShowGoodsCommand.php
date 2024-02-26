<?php

namespace Commands\CommandImplementations;

use Commands\AbstractCommand;
use Models\VendingMachineInterface;

class ShowGoodsCommand extends AbstractCommand
{
    public function execute(VendingMachineInterface $vendingMachine): void
    {
        $selectedProduct = $vendingMachine->getSelectedProduct();

        $this->write("Available Products (Name - Price):");

        foreach ($vendingMachine->getProducts() as $key => $product) {
            $isSelected = '[ ]';
            if ($selectedProduct && $selectedProduct->getId() === $product->getId()) {
                $isSelected = '[X]';
            }
            $this->write(sprintf("$isSelected №-%-2d %-10s - %-5s",$key +1,  $product->getName(), $product->getStringPrice()));
        }
    }
}