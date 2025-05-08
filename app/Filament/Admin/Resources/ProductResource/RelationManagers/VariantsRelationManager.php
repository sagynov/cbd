<?php

namespace App\Filament\Admin\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariantsRelationManager extends RelationManager
{
    protected static string $relationship = 'variants';

    public function isReadOnly(): bool
    {
        return false;
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sku')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('sku')
                    ->label(__('fields.sku'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->label(__('fields.is_active'))
                    ->default(true),
                Forms\Components\TextInput::make('flavor')
                    ->label(__('Flavor'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('strength')
                    ->label(__('Strength'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->label(__('fields.price'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('old_price')
                    ->label(__('fields.old_price'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('stock')
                    ->label(__('fields.stock'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('images')
                    ->label(__('fields.images'))
                    ->required()
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->minFiles(2)
                    ->panelLayout('grid')
                    ->preserveFilenames()
                    ->directory('products')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('sku')
            ->columns([
                Tables\Columns\TextColumn::make('sku'),
                Tables\Columns\TextColumn::make('flavor'),
                Tables\Columns\TextColumn::make('strength'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('old_price'),
                Tables\Columns\TextColumn::make('stock'),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label(__('fields.is_active')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
