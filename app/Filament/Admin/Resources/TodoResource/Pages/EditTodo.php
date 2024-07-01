<?php

namespace App\Filament\Admin\Resources\TodoResource\Pages;

use App\Filament\Admin\Resources\TodoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTodo extends EditRecord
{
    protected static string $resource = TodoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
