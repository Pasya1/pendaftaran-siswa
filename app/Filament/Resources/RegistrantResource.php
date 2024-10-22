<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrantResource\Pages;
use App\Filament\Resources\RegistrantResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Enum;
use Filament\Tables\Filters\SelectFilter;

class RegistrantResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationLabel = 'Data Calon Siswa';

    protected static ?string $navigationIcon = 'heroicon-o-user-circle'; // Ikon pengguna dalam lingkaran

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_lengkap')
                    ->required()
                    ->placeholder('Masukkan nama lengkap'),
                Select::make('jenis_kelamin')
                    ->options([
                        'laki-laki' => 'Laki-laki',
                        'perempuan' => 'Perempuan',
                    ])
                    ->required()
                    ->placeholder('Pilih jenis kelamin'),
                TextInput::make('tempat_lahir')
                    ->required()
                    ->placeholder('Masukkan tempat lahir'),
                DatePicker::make('tanggal_lahir')
                    ->required()
                    ->placeholder('Pilih tanggal lahir'),
                TextInput::make('no_telepon')
                    ->required()
                    ->tel()
                    ->placeholder('Masukkan nomor telepon'),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->placeholder('Masukkan email'),
                TextInput::make('alamat_lengkap')
                    ->required()
                    ->placeholder('Masukkan alamat lengkap'),
                TextInput::make('kode_pos')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan kode pos'),
                TextInput::make('nama_sekolah')
                    ->required()
                    ->placeholder('Masukkan nama sekolah'),
                TextInput::make('jurusan')
                    ->label('Minat/ Prestasi')
                    ->required()
                    ->placeholder('Masukkan Minat/ Prestasi'),
                TextInput::make('tahun_lulus')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan tahun lulus'),
                TextInput::make('nilai_rata_rata')
                    ->label('NEM')
                    ->required()
                    ->numeric()
                    ->placeholder('Masukkan NEM contoh: 39.9'),
                FileUpload::make('foto')
                    ->image()
                    ->directory('fotos')
                    ->required(),
                FileUpload::make('ktp')
                    ->image()
                    ->directory('ktps')
                    ->required(),
                FileUpload::make('ijazah')
                    ->image()
                    ->directory('ijazahs')
                    ->required(),
                FileUpload::make('transkrip_nilai')
                    ->image()
                    ->directory('transkrip_nilais')
                    ->required(),
                FileUpload::make('surat_rekomendasi')
                    ->image()
                    ->directory('surat_rekomendasis')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('nama_lengkap')->searchable(),
                TextColumn::make('jenis_kelamin')->searchable(),
                TextColumn::make('tempat_lahir')->searchable(),
                TextColumn::make('tanggal_lahir')->date('d/m/Y')->searchable(),
                TextColumn::make('no_telepon')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('alamat_lengkap')->searchable(),
                TextColumn::make('kode_pos')->searchable(),
                TextColumn::make('nama_sekolah')->searchable(),
                TextColumn::make('jurusan')
                    ->label('Minat/ Prestasi')
                    ->searchable(),
                TextColumn::make('tahun_lulus')->searchable(),
                TextColumn::make('nilai_rata_rata')
                    ->label('NEM')
                    ->searchable(),
                ImageColumn::make('foto'),
                ImageColumn::make('ktp'),
                ImageColumn::make('ijazah'),
                ImageColumn::make('transkrip_nilai'),
                ImageColumn::make('surat_rekomendasi'),
            ])
            ->filters([
                SelectFilter::make('tahun_lulus')
                    ->options([
                        2020 => '2015',
                        2020 => '2016',
                        2020 => '2017',
                        2020 => '2018',
                        2020 => '2019',
                        2020 => '2020',
                        2021 => '2021',
                        2022 => '2022',
                        2023 => '2023',
                        2024 => '2024',
                    ])
                    ->placeholder('Pilih tahun lulus'),
                SelectFilter::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->placeholder('Pilih Jenis Kelamin'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrants::route('/'),
            'create' => Pages\CreateRegistrant::route('/create'),
            'edit' => Pages\EditRegistrant::route('/{record}/edit'),
        ];
    }
}
