<?php

namespace Modules\Core\Filament\Resources;

use Modules\Core\Filament\Resources\DataMigratedResource\Pages;
use Modules\Core\Filament\Resources\DataMigratedResource\RelationManagers;
use Modules\Core\Models\DataMigrated;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DataMigratedResource extends Resource
{
    protected static ?string $model = DataMigrated::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('module')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('table_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('array_key')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('hash')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('item_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('counter')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('module')
                    ->searchable(),
                Tables\Columns\TextColumn::make('table_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('array_key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('item_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('counter')
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
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListDataMigrateds::route('/'),
            'create' => Pages\CreateDataMigrated::route('/create'),
            'edit' => Pages\EditDataMigrated::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
