<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ThemeResource\Pages;
use App\Filament\Resources\ThemeResource\RelationManagers;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->label('Tema Adı'),
                Forms\Components\Textarea::make('description')->label('Açıklama'),
                Forms\Components\FileUpload::make('preview_image')
                    ->label('Önizleme Görseli')
                    ->image()
                    ->directory('themes/previews')
                    ->imagePreviewHeight('100')
                    ->maxSize(2048),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->directory('themes/logos')
                    ->imagePreviewHeight('100')
                    ->maxSize(2048),
                Forms\Components\TextInput::make('config.primary_color')
                    ->label('Ana Renk (Hex)')
                    ->default('#764ba2'),
                Forms\Components\TextInput::make('config.secondary_color')
                    ->label('İkincil Renk (Hex)')
                    ->default('#667eea'),
                Forms\Components\Select::make('config.font_family')
                    ->label('Yazı Tipi')
                    ->options([
                        'Inter' => 'Inter',
                        'Roboto' => 'Roboto',
                        'Open Sans' => 'Open Sans',
                        'Montserrat' => 'Montserrat',
                        'Lato' => 'Lato',
                    ])
                    ->default('Inter'),
                Forms\Components\Toggle::make('is_active')->label('Aktif'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('preview_image')
                    ->label('Önizleme')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->label('Tema Adı')->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Açıklama')->limit(30),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'create' => Pages\CreateTheme::route('/create'),
            'edit' => Pages\EditTheme::route('/{record}/edit'),
        ];
    }
}
