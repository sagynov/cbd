<?php

namespace App\Filament\Admin\Resources;

use App\Enums\ProductOption;
use App\Filament\Admin\Resources\ProductResource\Pages;
use App\Filament\Admin\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Tables\Actions\EditAction;
class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?int $navigationSort = 30;

    public static function getNavigationLabel(): string
    {
        return __('Products');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Products');
    }
    public static function getModelLabel(): string
    {
        return __('Product');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('fields.name'))
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, $set) {
                        $set('slug', Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->label(__('fields.slug'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->label(__('fields.description')),
                Forms\Components\Toggle::make('is_active')
                    ->label(__('fields.is_active'))
                    ->default(true),
                Forms\Components\Toggle::make('has_variants')
                    ->label(__('fields.has_variants'))
                    ->default(false)
                    ->live(),
                Forms\Components\Repeater::make('variants')
                    ->visible(fn (Get $get) => $get('has_variants'))
                    ->label(__('fields.variants'))
                    ->relationship('variants')
                    ->schema([
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
                    ]),
                Forms\Components\TextInput::make('sku')
                ->visible(fn (Get $get) => !$get('has_variants'))
                    ->label(__('fields.sku'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('images')
                ->visible(fn (Get $get) => !$get('has_variants'))
                    ->label(__('fields.images'))
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->minFiles(2)
                    ->panelLayout('grid')
                    ->preserveFilenames()
                    ->directory('products')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->visible(fn (Get $get) => !$get('has_variants'))
                    ->label(__('fields.price'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    ->label(__('fields.category'))
                    ->relationship('category', 'name')
                    ->required(),
                    
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_links')
                    ->label(__('fields.images')),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('fields.name')),
                Tables\Columns\TextColumn::make('description')
                    ->label(__('fields.description'))
                    ->limit(50),
                Tables\Columns\TextColumn::make('price')
                    ->label(__('fields.price')),
                Tables\Columns\TextColumn::make('category.name')
                    ->label(__('fields.category')),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('variants');
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\ReviewsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
