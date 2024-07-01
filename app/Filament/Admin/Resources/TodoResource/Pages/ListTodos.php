<?php

namespace App\Filament\Admin\Resources\TodoResource\Pages;

use App\Filament\Admin\Resources\TodoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTodos extends ListRecords
{
    protected static string $resource = TodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
