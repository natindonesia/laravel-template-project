<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AuditTrailResource\Pages;
use App\Filament\Admin\Resources\AuditTrailResource\RelationManagers;
use App\Models\AuditTrail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AuditTrailResource extends Resource
{
    protected static ?string $model = AuditTrail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author_type'),
                Forms\Components\TextInput::make('author_id')
                    ->numeric(),
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\TextInput::make('description'),
                Forms\Components\TextInput::make('auditable_type'),
                Forms\Components\TextInput::make('auditable_id')
                    ->numeric(),
                Forms\Components\KeyValue::make('old_values')
                    ->columnSpanFull(),
                Forms\Components\KeyValue::make('new_values')
                    ->columnSpanFull(),
                Forms\Components\KeyValue::make('author_additional_data')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('auditable_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('auditable_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuditTrails::route('/'),
            'create' => Pages\CreateAuditTrail::route('/create'),
            'edit' => Pages\EditAuditTrail::route('/{record}/edit'),
        ];
    }
}
