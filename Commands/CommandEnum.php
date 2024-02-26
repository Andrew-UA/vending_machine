<?php

namespace Commands;

enum CommandEnum: string
{
    case EXIT  = "0";
    case SHOW_GOODS = "1";
    case SELECT_ITEM = "2";
    case TOP_UP_BALANCE = "3";
    case SHOW_BALANCE = "4";
    case BUY_ITEM = "5";

    public static function getCommandByValue(string $value): self|null
    {
        foreach (self::cases() as $enum) {
            if ($enum->value === $value) {
                return $enum;
            }
        }

        return null;
    }
}
