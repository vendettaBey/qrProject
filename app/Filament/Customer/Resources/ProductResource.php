<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Menu;

class ProductResource extends Resource
{
  protected static ?string $model = Product::class;
  protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
  protected static ?string $navigationGroup = 'Menü Yönetimi';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Select::make('menu_id')
          ->label('Menü')
          ->options(function () {
            $tenantId = Auth::user()->tenant_id;
            return Menu::where('tenant_id', $tenantId)->pluck('name', 'id');
          })
          ->required()
          ->live()
          ->afterStateUpdated(function ($state, $set) {
            $set('category_id', null);
          }),
        Forms\Components\Select::make('category_id')
          ->label('Kategori')
          ->options(function ($get) {
            $menuId = $get('menu_id');
            if (!$menuId) {
              return [];
            }
            return Category::where('menu_id', $menuId)->pluck('name', 'id');
          })
          ->required()
          ->live(),
        Forms\Components\TextInput::make('name')->required()->label('Ürün Adı'),
        Forms\Components\Textarea::make('description')->label('Açıklama'),
        Forms\Components\TextInput::make('price')->numeric()->required()->label('Fiyat'),
        Forms\Components\FileUpload::make('image')
          ->label('Ürün Fotoğrafı')
          ->image()
          ->directory('products')
          ->imagePreviewHeight('100')
          ->maxSize(2048),
        Forms\Components\Toggle::make('is_available')->label('Mevcut'),
        Forms\Components\Toggle::make('is_featured')->label('Öne Çıkan'),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('image')
          ->label('Fotoğraf')
          ->circular(),
        Tables\Columns\TextColumn::make('name')->label('Ürün Adı')->searchable(),
        Tables\Columns\TextColumn::make('category.menu.name')->label('Menü'),
        Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
        Tables\Columns\TextColumn::make('price')->label('Fiyat')->money('TRY', true),
        Tables\Columns\IconColumn::make('is_available')->boolean()->label('Mevcut'),
        Tables\Columns\IconColumn::make('is_featured')->boolean()->label('Öne Çıkan'),
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

  public static function getEloquentQuery(): Builder
  {
    return parent::getEloquentQuery()->whereHas('category.menu', function ($q) {
      $q->where('tenant_id', Auth::user()->tenant_id);
    });
  }

  public static function canCreate(): bool
  {
    return Auth::check() && Auth::user()->hasRole('customer');
  }
}