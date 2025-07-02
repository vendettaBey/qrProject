<?php

namespace App\Filament\Customer\Resources;

use App\Filament\Customer\Resources\ThemeResource\Pages;
use App\Models\Theme;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class ThemeResource extends Resource
{
  protected static ?string $model = Theme::class;

  protected static ?string $navigationIcon = 'heroicon-o-paint-brush';

  protected static ?string $navigationLabel = 'Temalar';

  protected static ?string $modelLabel = 'Tema';

  protected static ?string $pluralModelLabel = 'Temalar';

  protected static ?int $navigationSort = 3;

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Tema Bilgileri')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Tema Adı')
              ->required()
              ->maxLength(255)
              ->disabled(),
            Forms\Components\TextInput::make('description')
              ->label('Açıklama')
              ->maxLength(255)
              ->disabled(),
            Forms\Components\TextInput::make('folder_name')
              ->label('Klasör Adı')
              ->maxLength(255)
              ->disabled(),
            Forms\Components\Toggle::make('is_active')
              ->label('Aktif')
              ->default(false)
              ->live()
              ->afterStateUpdated(function ($state, $set) {
                if ($state) {
                  // Eğer tema aktif ediliyorsa, diğer temaları deaktif et
                  $user = Auth::user();
                  $tenant = Tenant::where('id', $user->tenant_id)->first();

                  if ($tenant) {
                    $tenant->themes()->update(['is_active' => false]);
                  }
                }
              }),
          ])
          ->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')
          ->label('Tema Adı')
          ->searchable(),
        Tables\Columns\TextColumn::make('description')
          ->label('Açıklama')
          ->searchable(),
        Tables\Columns\IconColumn::make('is_active')
          ->label('Aktif')
          ->boolean(),
        Tables\Columns\TextColumn::make('created_at')
          ->label('Oluşturulma Tarihi')
          ->dateTime('d.m.Y H:i')
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        Tables\Columns\TextColumn::make('updated_at')
          ->label('Güncellenme Tarihi')
          ->dateTime('d.m.Y H:i')
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->filters([
        //
      ])
      ->actions([
        Tables\Actions\Action::make('preview')
          ->label('Önizle')
          ->icon('heroicon-o-eye')
          ->url(fn(Theme $record): string => route('theme.preview', ['themeId' => $record->id]))
          ->openUrlInNewTab(),
        Tables\Actions\EditAction::make(),
        Tables\Actions\Action::make('activate')
          ->label('Aktif Et')
          ->icon('heroicon-o-check-circle')
          ->visible(fn(Theme $record): bool => !$record->is_active)
          ->action(function (Theme $record): void {
            // Önce tüm temaları deaktif et
            $user = Auth::user();
            $tenant = Tenant::where('id', $user->tenant_id)->first();

            if ($tenant) {
              // Tenant'a ait tüm temaları deaktif et
              Theme::where('id', '!=', $record->id)->update(['is_active' => false]);

              // Seçilen temayı aktif et
              $record->is_active = true;
              $record->save();

              // Tenant'ın tema ID'sini güncelle
              $tenant->theme_id = $record->id;
              $tenant->save();

              Notification::make()
                ->title('Tema aktif edildi')
                ->success()
                ->send();
            }
          }),
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
      'index' => Pages\ListThemes::route('/'),
      'edit' => Pages\EditTheme::route('/{record}/edit'),
    ];
  }

  public static function getEloquentQuery(): Builder
  {
    $query = parent::getEloquentQuery();

    // Giriş yapan kullanıcının tenant_id'sini al
    $user = Auth::user();
    if ($user && $user->tenant_id) {
      // Kullanıcının tenant_id'sine ait veya tenant_id null olan (genel) temaları getir
      $query->where(function ($query) use ($user) {
        $query->where('tenant_id', $user->tenant_id)
          ->orWhereNull('tenant_id');
      });
    }

    return $query;
  }
}