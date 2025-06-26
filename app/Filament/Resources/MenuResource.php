<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Menü Yönetimi';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Menü Bilgileri')
                    ->schema([
                        Forms\Components\Select::make('tenant_id')
                            ->label('Müşteri')
                            ->relationship('tenant', 'name')
                            ->required()
                            ->searchable(),
                        Forms\Components\TextInput::make('name')
                            ->label('Menü Adı')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Açıklama')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2),

                Forms\Components\Section::make('Görsel Öğeler')
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->directory('menus/logos')
                            ->nullable(),
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Kapak Resmi')
                            ->image()
                            ->directory('menus/covers')
                            ->nullable(),
                    ])->columns(2),

                Forms\Components\Section::make('Ayarlar')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                        Forms\Components\KeyValue::make('settings')
                            ->label('Menü Ayarları')
                            ->nullable(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenant.name')
                    ->label('Müşteri')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Menü Adı')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->circular(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Durum')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\TextColumn::make('categories_count')
                    ->label('Kategori Sayısı')
                    ->counts('categories'),
                Tables\Columns\TextColumn::make('qr_codes_count')
                    ->label('QR Kod Sayısı')
                    ->counts('qrCodes'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Oluşturulma Tarihi')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tenant')
                    ->label('Müşteri')
                    ->relationship('tenant', 'name'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Durum'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('qr_codes')
                    ->label('QR Kodlar')
                    ->icon('heroicon-o-qr-code')
                    ->url(fn(Menu $record): string => route('filament.admin.resources.qr-codes.index', ['tableFilters[menu_id][value]' => $record->id])),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
