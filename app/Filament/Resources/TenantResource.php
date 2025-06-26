<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenantResource\Pages;
use App\Filament\Resources\TenantResource\RelationManagers;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationGroup = 'Sistem Yönetimi';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Temel Bilgiler')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Müşteri Adı')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('domain')
                            ->label('Domain')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText('Örnek: restoran1.qrmenu.com'),
                        Forms\Components\TextInput::make('database_name')
                            ->label('Veritabanı Adı')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Forms\Components\Select::make('theme_id')
                            ->label('Tema')
                            ->relationship('theme', 'name')
                            ->searchable()
                            ->nullable()
                            ->helperText('Müşterinin kullanacağı tema'),
                    ])->columns(4),

                Forms\Components\Section::make('Durum ve Ayarlar')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Durum')
                            ->options([
                                'active' => 'Aktif',
                                'inactive' => 'Pasif',
                                'suspended' => 'Askıya Alınmış',
                            ])
                            ->default('active')
                            ->required(),
                        Forms\Components\DateTimePicker::make('trial_ends_at')
                            ->label('Deneme Süresi Bitiş')
                            ->nullable(),
                        Forms\Components\DateTimePicker::make('subscription_ends_at')
                            ->label('Abonelik Bitiş')
                            ->nullable(),
                        Forms\Components\KeyValue::make('settings')
                            ->label('Ayarlar')
                            ->nullable(),
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
                Tables\Columns\TextColumn::make('domain')
                    ->label('Domain')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Durum')
                    ->colors([
                        'success' => 'active',
                        'danger' => 'suspended',
                        'warning' => 'inactive',
                    ]),
                Tables\Columns\TextColumn::make('users_count')
                    ->label('Kullanıcı Sayısı')
                    ->counts('users'),
                Tables\Columns\TextColumn::make('menus_count')
                    ->label('Menü Sayısı')
                    ->counts('menus'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Durum')
                    ->options([
                        'active' => 'Aktif',
                        'inactive' => 'Pasif',
                        'suspended' => 'Askıya Alınmış',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('manage')
                    ->label('Yönet')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->url(fn(Tenant $record): string => route('filament.admin.resources.tenants.edit', $record)),
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
