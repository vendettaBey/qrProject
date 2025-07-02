<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\TenantResource\Pages;
use App\Models\Tenant;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TenantResource extends Resource
{
  protected static ?string $model = Tenant::class;

  protected static ?string $navigationIcon = 'heroicon-o-building-office';

  protected static ?string $navigationGroup = 'Müşteri Yönetimi';

  protected static ?string $modelLabel = 'Müşteri';

  protected static ?string $pluralModelLabel = 'Müşteriler';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Müşteri Bilgileri')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Müşteri Adı')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('email')
              ->label('E-posta')
              ->email()
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('phone')
              ->label('Telefon')
              ->tel()
              ->maxLength(255),
            Forms\Components\TextInput::make('address')
              ->label('Adres')
              ->maxLength(255),
            Forms\Components\Select::make('theme_id')
              ->label('Tema')
              ->relationship('theme', 'name')
              ->searchable()
              ->preload(),
            Forms\Components\Toggle::make('is_active')
              ->label('Aktif')
              ->default(true),
          ])->columns(2),

        Forms\Components\Section::make('Müşteri Giriş Bilgileri')
          ->description('Bu bilgiler müşterinin panele giriş yapması için kullanılacak')
          ->schema([
            Forms\Components\TextInput::make('user_name')
              ->label('Kullanıcı Adı')
              ->helperText('Müşterinin panele giriş yaparken kullanacağı ad')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('user_email')
              ->label('Kullanıcı E-posta')
              ->helperText('Müşterinin panele giriş yaparken kullanacağı e-posta')
              ->email()
              ->required()
              ->maxLength(255)
              ->unique(table: 'users', column: 'email'),
            Forms\Components\TextInput::make('user_password')
              ->label('Şifre')
              ->helperText('Müşterinin panele giriş yaparken kullanacağı şifre')
              ->password()
              ->required(fn(string $context): bool => $context === 'create')
              ->minLength(8)
              ->confirmed(),
            Forms\Components\TextInput::make('user_password_confirmation')
              ->label('Şifre Tekrar')
              ->password()
              ->required(fn(string $context): bool => $context === 'create')
              ->minLength(8)
              ->dehydrated(false),
          ])->columns(2),
      ]);
  }

  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('name')
          ->label('Müşteri Adı')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('email')
          ->label('E-posta')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('phone')
          ->label('Telefon')
          ->searchable(),
        Tables\Columns\TextColumn::make('theme.name')
          ->label('Tema')
          ->sortable(),
        Tables\Columns\IconColumn::make('is_active')
          ->label('Durum')
          ->boolean()
          ->sortable(),
        Tables\Columns\TextColumn::make('created_at')
          ->label('Kayıt Tarihi')
          ->dateTime('d.m.Y H:i')
          ->sortable(),
      ])
      ->filters([
        Tables\Filters\TernaryFilter::make('is_active')
          ->label('Durum')
          ->placeholder('Tümü')
          ->trueLabel('Aktif')
          ->falseLabel('Pasif'),
        Tables\Filters\SelectFilter::make('theme_id')
          ->label('Tema')
          ->relationship('theme', 'name'),
      ])
      ->actions([
        Tables\Actions\EditAction::make(),
        Tables\Actions\DeleteAction::make()
          ->before(function ($record) {
            // Tenant'a bağlı tüm kullanıcıları sil
            $record->users()->delete();
          }),
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
      'index' => Pages\ListTenants::route('/'),
      'create' => Pages\CreateTenant::route('/create'),
      'edit' => Pages\EditTenant::route('/{record}/edit'),
    ];
  }
}