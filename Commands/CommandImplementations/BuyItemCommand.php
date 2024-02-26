<?php

namespace Commands\CommandImplementations;

use Commands\AbstractCommand;
use Models\VendingMachineInterface;

class BuyItemCommand extends AbstractCommand
{
    public function execute(VendingMachineInterface $vendingMachine): void
    {
        $selectedProduct = $vendingMachine->getSelectedProduct();
        if ($selectedProduct === null) {
            $this->write("Product not selected");

            return;
        }

        $balance = $vendingMachine->getBalance();
        if ($balance < $selectedProduct->getPrice()) {
            $this->write("Top up your balance");

            return;
        }

        $this->write("Please take your - " . $selectedProduct->getName());

        if ($balance > $selectedProduct->getPrice()) {
            $this->write(sprintf("Pick up your change - %.2f", $balance - $selectedProduct->getPrice()));
        }
        $this->write("");
        $vendingMachine->setBalance(0);
        $vendingMachine->unSelectProduct();
    }
}