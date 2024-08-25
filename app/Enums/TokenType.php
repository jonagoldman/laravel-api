<?php

namespace App\Enums;

use Illuminate\Support\Str;

enum TokenType: string
{
    case BEARER = 'bearer';
    case REFRESH = 'refresh';
    case REMEMBER = 'remember';
}
