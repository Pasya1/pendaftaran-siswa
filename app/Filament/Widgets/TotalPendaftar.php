<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalPendaftar extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $total_pendaftar = Student::count();

        return [
            Stat::make('Total Pendaftar', $total_pendaftar)
                ->description(now()->format('F Y')) // Menampilkan bulan dan tahun
                ->icon('heroicon-o-user')
                ->color('success'), // Sesuaikan dengan gaya tampilan Anda
        ];
    }
}
