<?php

namespace App\Enums;

enum UserRolesEnum: int
{
    case ADMIN = 1;
    case SHOP = 2;
    case RIDER = 3;
    case CUSTOMER = 4;
}
