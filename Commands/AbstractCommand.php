<?php

namespace Commands;

use Models\VendingMachineInterface;
use Traits\Readable;
use Traits\Writeable;

abstract class AbstractCommand implements CommandInterface
{
    use Readable, Writeable;
    abstract public function execute(VendingMachineInterface $vendingMachine): void;
}