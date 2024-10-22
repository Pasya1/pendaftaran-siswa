<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Registration;
use Filament\Widgets\Widget;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Contracts\View\View;

class DataPendaftar extends Widget
{
    protected static string $view = 'filament.widgets.data-pendaftar';
    protected static ?int $sort = 2;
    public function render(): View
    {
        return view(static::$view, [
            'registrasi' => Registration::with(['student', 'program'])->get(),
        ]);
    }
}
