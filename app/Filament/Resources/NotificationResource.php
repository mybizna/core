<?php

namespace Modules\Core\Filament\Resources;

use Modules\Core\Filament\Resources\NotificationResource\Pages;
use Modules\Core\Filament\Resources\NotificationResource\RelationManagers;
use Modules\Core\Models\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('short')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('medium')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('lengthy')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('enable_short')
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('enable_medium')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('enable_lengthy')
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('published')
                    ->numeric()
                    ->default(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('short')
                    ->searchable(),
                Tables\Columns\TextColumn::make('medium')
                    ->searchable(),
                Tables\Columns\TextColumn::make('enable_short')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('enable_medium')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('enable_lengthy')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published')
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
            'index' => Pages\ListNotifications::route('/'),
            'create' => Pages\CreateNotification::route('/create'),
            'edit' => Pages\EditNotification::route('/{record}/edit'),
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
