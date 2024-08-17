<?php

namespace App\Filament\Admin\Resources\UserResource\Pages;

use App\Filament\Admin\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use XliteDev\FilamentImpersonate\Tables\Actions\ImpersonateAction;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            \XliteDev\FilamentImpersonate\Pages\Actions\ImpersonateAction::make()
        ];
    }
}
