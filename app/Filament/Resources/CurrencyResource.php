<?php

namespace Modules\Core\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Modules\Base\Filament\Resources\BaseResource;
use Modules\Core\Filament\Resources\CurrencyResource\Pages;
use Modules\Core\Models\Currency;

class CurrencyResource extends BaseResource
{
    protected static ?string $model = Currency::class;

    protected static ?string $slug = 'core/currency';

    protected static ?string $navigationGroup = 'Core';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('symbol')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('rate')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('buying')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('selling')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('published')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('is_fetched')
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('is_system')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('symbol')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rate')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('buying')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('selling')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('published')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_fetched')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_system')
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
