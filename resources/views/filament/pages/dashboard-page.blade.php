@extends('filament::page')

@section('content')
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Widget Total Pendaftar -->
        @livewire(App\Filament\Widgets\TotalPendaftar::class)

        <!-- Widget Data Pendaftar -->
        @livewire(App\Filament\Widgets\DataPendaftar::class)
    </div>
@endsection
