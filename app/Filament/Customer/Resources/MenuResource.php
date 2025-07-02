<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\MenuResource\Pages;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MenuResource extends Resource
{
  protected static ?string $model = Menu::class;

  protected static ?string $navigationIcon = 'heroicon-o-bars-3';

  protected static ?string $navigationGroup = 'Menü Yönetimi';

  protected static ?string $modelLabel = 'Menü';

  protected static ?string $pluralModelLabel = 'Menüler';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Menü Bilgileri')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Menü Adı')
              ->required()
              ->maxLength(255),
            Forms\Components\Textarea::make('description')
              ->label('Açıklama')
              ->maxLength(500)
              ->rows(3),
            Forms\Components\Toggle::make('is_active')
              ->label('Aktif')
              ->default(true),
          ])->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')
          ->label('Menü Adı')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('description')
          ->label('Açıklama')
          ->limit(50)
          ->searchable(),
        Tables\Columns\IconColumn::make('is_active')
          ->label('Durum')
          ->boolean()
          ->sortable(),
        Tables\Columns\TextColumn::make('created_at')
          ->label('Oluşturulma Tarihi')
          ->dateTime('d.m.Y H:i')
          ->sortable(),
      ])
      ->filters([
        Tables\Filters\TernaryFilter::make('is_active')
          ->label('Durum')
          ->placeholder('Tümü')
          ->trueLabel('Aktif')
          ->falseLabel('Pasif'),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ])
      ->defaultSort('created_at', 'desc')
      ->modifyQueryUsing(function (Builder $query) {
        // Sadece kullanıcının tenant'ına ait menüleri göster
        $user = Auth::user();
        if ($user && $user->tenant_id) {
          $query->where('tenant_id', $user->tenant_id);
        }
      });
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
      'index' => Pages\ListMenus::route('/'),
      'create' => Pages\CreateMenu::route('/create'),
      'edit' => Pages\EditMenu::route('/{record}/edit'),
    ];
  }
}