<?php

namespace App\Filament\Admin\Resources\TodoResource\Pages;

use App\Filament\Admin\Resources\TodoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTodo extends CreateRecord
{
    protected static string $resource = TodoResource::class;
}
