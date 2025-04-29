<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BannerResource\Pages;
use App\Filament\Admin\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?int $navigationSort = 10;

    public static function getNavigationLabel(): string
    {
        return __('Banners');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Banners');
    }
    public static function getModelLabel(): string
    {
        return __('Banner');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->required(),
                Forms\Components\TextInput::make('button_text')
                    ->label(__('fields.button_text'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('button_link')
                    ->label(__('fields.button_link'))
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('fields.image')),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('fields.title')),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('fields.description')),
                Tables\Columns\TextColumn::make('button_text')
                    ->label(__('fields.button_text')),
                Tables\Columns\TextColumn::make('button_link')
                    ->label(__('fields.button_link')),
            ])
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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
