<?php

namespace Commands\CommandImplementations;

use Commands\AbstractCommand;
use Models\VendingMachineInterface;

class SelectItemCommand extends AbstractCommand
{
    public function execute(VendingMachineInterface $vendingMachine): void
    {
        do {
            $value = $this->read("Enter product number №- ");

            if ($value === "0") {
                return;
            }

            if (!$this->validate($value)) {
                $this->write("Bad input!");
                continue;
            }

            if (!$this->selectProduct($vendingMachine, (int) $value)) {
                $this->write("Product not found!");
                continue;
            }

            return;
        } while(true);
    }

    private function validate(string $input): bool
    {
        $rule = '/^([0-9]|[1-9]\d*)$/';

        $result = preg_match($rule, $input);

        return !($result === false);
    }

    private function selectProduct(VendingMachineInterface $vendingMachine, int $productNumber): bool
    {
        foreach ($vendingMachine->getProducts() as $key => $product) {
            if ($key + 1 === $productNumber) {
                return $vendingMachine->selectProduct($product);
            }
        }

        return false;
    }
}