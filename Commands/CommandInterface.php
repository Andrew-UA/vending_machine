<?php

namespace Commands;

use Models\VendingMachineInterface;

interface CommandInterface
{
    public function execute(VendingMachineInterface $vendingMachine): void;
}