<?php

namespace App\Filament\SuperAdmin\Resources;

use App\Filament\SuperAdmin\Resources\UserResource\Pages;
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

class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static ?string $navigationIcon = 'heroicon-o-users';

  protected static ?string $navigationGroup = 'Kullanıcı Yönetimi';

  protected static ?string $modelLabel = 'Kullanıcı';

  protected static ?string $pluralModelLabel = 'Kullanıcılar';

  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Kullanıcı Bilgileri')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Ad Soyad')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('email')
              ->label('E-posta')
              ->email()
              ->required()
              ->maxLength(255)
              ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('password')
              ->label('Şifre')
              ->password()
              ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
              ->dehydrated(fn($state) => filled($state))
              ->required(fn(string $context): bool => $context === 'create'),
            Forms\Components\Select::make('roles')
              ->label('Rol')
              ->multiple()
              ->relationship('roles', 'name')
              ->preload()
              ->searchable()
              ->options(function () {
                return Role::all()->pluck('name', 'id');
              })
              ->default(function () {
                // Varsayılan olarak customer rolünü seç
                $customerRole = Role::where('name', 'customer')->first();
                return $customerRole ? [$customerRole->id] : [];
              })
              ->required(),
            Forms\Components\Select::make('tenant_id')
              ->label('Müşteri')
              ->relationship('tenant', 'name')
              ->searchable()
              ->preload()
              ->visible(fn(string $context): bool => $context === 'create' || request()->user()->hasRole('super_admin')),
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
          ->label('Ad Soyad')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('email')
          ->label('E-posta')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('roles.name')
          ->label('Rol')
          ->badge()
          ->color(fn(string $state): string => match ($state) {
            'super_admin' => 'danger',
            'customer' => 'success',
            default => 'gray',
          })
          ->formatStateUsing(fn(string $state): string => match ($state) {
            'super_admin' => 'Super Admin',
            'customer' => 'Müşteri',
            default => $state,
          })
          ->sortable(),
        Tables\Columns\TextColumn::make('tenant.name')
          ->label('Müşteri')
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
        Tables\Filters\SelectFilter::make('roles')
          ->label('Rol')
          ->relationship('roles', 'name')
          ->multiple(),
        Tables\Filters\TernaryFilter::make('is_active')
          ->label('Durum')
          ->placeholder('Tümü')
          ->trueLabel('Aktif')
          ->falseLabel('Pasif'),
        Tables\Filters\SelectFilter::make('tenant_id')
          ->label('Müşteri')
          ->relationship('tenant', 'name'),
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
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}