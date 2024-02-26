<?php

namespace App;

use Commands\CommandEnum;
use Commands\CommandInterface;
use Models\VendingMachineInterface;
use Traits\Readable;
use Traits\Writeable;

readonly class Application
{
    use Readable, Writeable;

    public function __construct(private array $commands, private VendingMachineInterface $vendingMachine)
    {
    }

    /**
     * Run program.
     */
    public function run(): void
    {
        $this->write("Hello in vending machine.\n");
        $this->getCommandExecution(CommandEnum::SHOW_GOODS)?->execute($this->vendingMachine);
        $this->getCommandExecution(CommandEnum::SHOW_BALANCE)?->execute($this->vendingMachine);

        while (true) {
            $this->writeAllCommands();

            do {
                $value = $this->read("Make your choice: ");
                if ($value === CommandEnum::EXIT->value) {
                    $this->write("Bye, bye...");
                    return;
                }

                $command = CommandEnum::getCommandByValue($value);
                if ($command === null) {
                    $this->write("Unknown command. Repeat pleas.");
                    continue;
                }

                $this->getCommandExecution($command)?->execute($this->vendingMachine);

            } while ($command === null);
        }
    }

    /**
     * Write all available user commands.
     */
    private function writeAllCommands(): void
    {
        $this->write("");
        foreach (CommandEnum::cases() as $commandEnum) {
            $this->write(sprintf("%-15s - %-3s", $commandEnum->name, $commandEnum->value));
        }
    }

    /**
     * Get command implementation by command enum.
     *
     * @param CommandEnum $commandEnum
     * @return CommandInterface|null
     */
    private function getCommandExecution(CommandEnum $commandEnum): CommandInterface|null
    {
        return array_key_exists($commandEnum->name, $this->commands) ? $this->commands[$commandEnum->name] : null;
    }
}