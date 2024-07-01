<?php

namespace App\Enums;

enum TodoStatus: string
{
    case Pending = 'Pending';
    case Completed = 'Completed';
    case Cancelled = 'Cancelled';
}
