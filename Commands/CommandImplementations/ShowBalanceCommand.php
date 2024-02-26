<?php

namespace Commands\CommandImplementations;

use Commands\AbstractCommand;
use Models\VendingMachineInterface;

class ShowBalanceCommand extends AbstractCommand
{

    public function execute(VendingMachineInterface $vendingMachine): void
    {
        $this->write("Your balance: " . sprintf("%0.2f", $vendingMachine->getBalance()));
    }
}