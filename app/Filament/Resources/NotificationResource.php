<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\NotificationResource\Pages;
use Modules\Core\Models\Notification;

class NotificationResource extends BaseResource
{
    protected static ?string $model = Notification::class;

    protected static ?string $slug = 'core/notification';

    protected static ?string $navigationGroup = 'Core';

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

    public static function getPages(): array
    {

        return [
            'index' => Pages\Listing::route('/'),
            'create' => Pages\Creating::route('/create'),
            'edit' => Pages\Editing::route('/{record}/edit'),
        ];
    }
}
