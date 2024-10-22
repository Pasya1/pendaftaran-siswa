<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteResource\Pages;
use App\Filament\Resources\SiteResource\RelationManagers;
use App\Models\Site;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Textarea;

class SiteResource extends Resource
{
    protected static ?string $model = Site::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar'; // Ikon grafik batang
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('universitas')
                    ->label('Nama Perusahan/Universitas')
                    ->placeholder('Nama Perusahan/Universitas')
                    ->required(),
                FileUpload::make('logo')
                    ->image()
                    ->directory('logos')
                    ->required(),
                FileUpload::make('background')
                    ->image()
                    ->directory('backgrounds')
                    ->required(),
                TextInput::make('primary_color')
                    ->maxLength(7)
                    ->placeholder('#FFFFFF')
                    ->required(),
                TextInput::make('secondary_color')
                    ->placeholder('#000000')
                    ->required(),
                TextInput::make('no_telepon_perusahaan')
                    ->numeric()
                    ->label('No Telepon Perusahaan/Universitas')
                    ->placeholder('No Telepon')
                    ->required(),
                TextInput::make('email_perusahaan')
                    ->label('Email Perusahaan/Universitas')
                    ->placeholder('Email')
                    ->required(),
                TextInput::make('alamat_perusahaan')
                    ->label('Alamat Perusahaan/Universitas')
                    ->placeholder('Alamat ')
                    ->required(),
                TextInput::make('jam_operasional_perusahaan')
                    ->label('Jam Operasional Perusahaan/Universitas')
                    ->placeholder('Contoh: Senin-Jumat 08:00 - 17:00')
                    ->required(),
                Textarea::make('google_maps_embed_code')
                    ->label('Google Maps Embed Code. (https://www.google.com/maps)')
                    ->rows(5)
                    ->placeholder('Masukkan kode embed Google Maps di sini (ambil hanya src nya saja tanpa tanda petik di depan dan belakang')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('universitas')
                    ->label('Sekolah'),
                ImageColumn::make('logo'),
                ImageColumn::make('background'),
                TextColumn::make('primary_color'),
                TextColumn::make('secondary_color'),
                TextColumn::make('no_telepon_perusahaan'),
                TextColumn::make('email_perusahaan'),
                TextColumn::make('alamat_perusahaan'),
                TextColumn::make('jam_operasional_perusahaan'),
                TextColumn::make('google_maps_embed_code'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSites::route('/'),
            // 'create' => Pages\CreateSite::route('/create'),
            'edit' => Pages\EditSite::route('/{record}/edit'),
        ];
    }
}
