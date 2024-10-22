<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use App\Filament\Widgets\TotalPendaftar;
use App\Filament\Widgets\DataPendaftar;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::registerWidgets([
            TotalPendaftar::class,
            DataPendaftar::class,
        ]);
    }

    public function register(): void
    {
        //
    }
}
