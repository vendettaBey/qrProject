<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;

class CategoryResource extends Resource
{
  protected static ?string $model = Category::class;
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
          ->required(),
        Forms\Components\TextInput::make('name')->required()->label('Kategori Adı'),
        Forms\Components\Textarea::make('description')->label('Açıklama'),
        Forms\Components\Toggle::make('is_active')->label('Aktif'),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')->label('Kategori Adı')->searchable(),
        Tables\Columns\TextColumn::make('description')->label('Açıklama')->limit(30),
        Tables\Columns\IconColumn::make('is_active')->boolean()->label('Aktif'),
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
      'index' => Pages\ListCategories::route('/'),
      'create' => Pages\CreateCategory::route('/create'),
      'edit' => Pages\EditCategory::route('/{record}/edit'),
    ];
  }

  public static function getEloquentQuery(): Builder
  {
    return parent::getEloquentQuery()->whereHas('menu', function ($q) {
      $q->where('tenant_id', Auth::user()->tenant_id);
    });
  }

  public static function shouldRegisterNavigation(): bool
  {
    return true;
  }

  public static function canCreate(): bool
  {
    return auth()->user()?->hasRole('customer');
  }
}