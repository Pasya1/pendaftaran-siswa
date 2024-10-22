<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ParentResource\Pages;
use App\Filament\Resources\ParentResource\RelationManagers;
use App\Models\Orangtua;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParentResource extends Resource
{
    protected static ?string $model = Orangtua::class;

    protected static ?string $navigationLabel = 'Data Orang Tua Pendaftar';

    protected static string $title = 'Tambah Orang Tua Pendaftar';

    protected static ?string $navigationIcon = 'heroicon-o-users'; // Ikon pengguna

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_orang_tua')
                    ->required(),
                TextInput::make('pekerjaan_orang_tua')
                    ->required(),
                TextInput::make('no_telepon_orang_tua')
                    ->required(),
                TextInput::make('alamat_orang_tua')
                    ->required(),
            ]);
    }

    public static function edit($record)
    {
        dd($record->load('student')); // Debug untuk melihat data student
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.nama_lengkap')->searchable(),
                TextColumn::make('nama_orang_tua')->searchable(),
                TextColumn::make('pekerjaan_orang_tua')->searchable(),
                TextColumn::make('no_telepon_orang_tua')->searchable(),
                TextColumn::make('alamat_orang_tua')->searchable()
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

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParents::route('/'),
            'create' => Pages\CreateParent::route('/create'),
            'edit' => Pages\EditParent::route('/{record}/edit'),
        ];
    }
}
