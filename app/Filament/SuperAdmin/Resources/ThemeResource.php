<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\ThemeResource\Pages;
use App\Models\Theme;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThemeResource extends Resource
{
  protected static ?string $model = Theme::class;

  protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

  protected static ?string $navigationGroup = 'Sistem Yönetimi';

  protected static ?string $modelLabel = 'Tema';

  protected static ?string $pluralModelLabel = 'Temalar';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Tema Bilgileri')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Tema Adı')
              ->required()
              ->maxLength(255),
            Forms\Components\Textarea::make('description')
              ->label('Açıklama')
              ->maxLength(500)
              ->rows(3),
            Forms\Components\ColorPicker::make('primary_color')
              ->label('Ana Renk')
              ->required(),
            Forms\Components\ColorPicker::make('secondary_color')
              ->label('İkincil Renk')
              ->required(),
            Forms\Components\ColorPicker::make('background_color')
              ->label('Arka Plan Rengi')
              ->required(),
            Forms\Components\ColorPicker::make('text_color')
              ->label('Metin Rengi')
              ->required(),
            Forms\Components\Toggle::make('is_premium')
              ->label('Premium Tema')
              ->default(false),
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
        Tables\Columns\ImageColumn::make('preview_image')
          ->label('Önizleme')
          ->circular(),
        Tables\Columns\TextColumn::make('name')
          ->label('Tema Adı')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('description')
          ->label('Açıklama')
          ->limit(50)
          ->searchable(),
        Tables\Columns\ColorColumn::make('primary_color')
          ->label('Ana Renk'),
        Tables\Columns\IconColumn::make('is_premium')
          ->label('Premium')
          ->boolean()
          ->sortable(),
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
        Tables\Filters\TernaryFilter::make('is_premium')
          ->label('Premium')
          ->placeholder('Tümü')
          ->trueLabel('Premium')
          ->falseLabel('Ücretsiz'),
        Tables\Filters\TernaryFilter::make('is_active')
          ->label('Durum')
          ->placeholder('Tümü')
          ->trueLabel('Aktif')
          ->falseLabel('Pasif'),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make(),
        Tables\Actions\Action::make('preview')
          ->label('Önizle')
          ->icon('heroicon-o-eye')
          ->url(fn($record) => route('theme.preview', $record->id))
          ->openUrlInNewTab(),
      ])
      ->bulkActions([
        Tables\Actions\BulkActionGroup::make([
          Tables\Actions\DeleteBulkAction::make(),
        ]),
      ])
      ->defaultSort('created_at', 'desc');
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
      'index' => Pages\ListThemes::route('/'),
      'create' => Pages\CreateTheme::route('/create'),
      'edit' => Pages\EditTheme::route('/{record}/edit'),
    ];
  }
}