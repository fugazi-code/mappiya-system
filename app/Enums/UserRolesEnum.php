<?php

namespace App\Enums;

enum UserRolesEnum: int
{
    case ADMIN = 1;
    case SHOP = 2;
    case RIDER = 3;
    case CUSTOMER = 4;

    public static function nameToValue(string $name)
    {
        $names = explode('|', $name);
        $constant = [];
        foreach ($names as $item) {
            $constant[] = constant('self::'.str($item)->upper())->value;
        }

        return collect($constant);
    }
}
