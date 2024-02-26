<?php

namespace Commands\CommandImplementations;

use Commands\AbstractCommand;
use Commands\CommandEnum;
use Models\VendingMachineInterface;

class TopUpBalanceCommand extends AbstractCommand
{
    private array $availableCoins = [
        '0.01',
        '0.05',
        '0.10',
        '0.25',
        '0.50',
        '1.00',
    ];
    public function execute(VendingMachineInterface $vendingMachine): void
    {
        $this->write(CommandEnum::EXIT->value . " - " . CommandEnum::EXIT->name);
        do {
            $value = $this->read("Please insert a coin: ");
            if ($value === '0') {
                $this->write("");
                return;
            }

            if ($this->validate($value)) {
                $value = (float) $value;
                $vendingMachine->setBalance($vendingMachine->getBalance() + $value);
                $this->write(sprintf("%.2f - coins added.", $value));
                $this->write("Your balance: " . sprintf("%0.2f\n", $vendingMachine->getBalance()));
            } else {
                $this->write("Invalid coin. Do not cheat!");
            }
        } while (true);
    }

    private function validate(string $value): bool
    {
        return in_array($value, $this->availableCoins, true);
    }
}