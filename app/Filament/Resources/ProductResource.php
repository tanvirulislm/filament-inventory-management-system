<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Unit;
use Filament\Tables;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationLabel = 'Manage Products';

    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                self::getProductForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->label('Product Name'),
                Tables\Columns\TextColumn::make('code')
                ->searchable()
                ->sortable()
                ->label('Product Code'),
                Tables\Columns\TextColumn::make('quantity')
                ->searchable()
                ->sortable()
                ->label('Product Quantity'),
                Tables\Columns\TextColumn::make('price')
                ->searchable()
                ->sortable()
                ->label('Product Price'),
                Tables\Columns\TextColumn::make('safe_stock')
                ->searchable()
                ->sortable()
                ->label('Safety Stock'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getProductForm(){
        return [
            Forms\Components\Section::make('Product Details')->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->label('Product Name'),
                Forms\Components\TextInput::make('code')
                ->required()
                ->label('Product Code'),
                Forms\Components\Select::make('category_id')
                ->options(Category::pluck('name', 'id')->toArray())
                ->required()
                ->searchable()
                ->label('Product Category'),
                Forms\Components\Select::make('unit_id')
                ->options(Unit::pluck('name', 'id')->toArray())
                ->searchable()
                ->required()
                ->label('Product Unit'),
                Forms\Components\TextInput::make('price')
                ->required()
                ->numeric()
                ->label('Product Price'),
                Forms\Components\TextInput::make('quantity')
                ->required()
                ->numeric()
                ->label('Product Quantity'),
                Forms\Components\TextInput::make('safe_stock')
                ->numeric()
                ->helperText('Minimum stock to be stored')
                ->label('Safety Stock'),
                Forms\Components\Textarea::make('description')
                ->label('Description'),
                Forms\Components\KeyValue::make('data')
                ->label('Extra Data'),
            ])->columns(3),
            ];
    }
}
