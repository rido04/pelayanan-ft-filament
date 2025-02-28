<?php

namespace App\Filament\Resources\PelayananResource\Widgets;

use App\Models\Pelayanan;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class PelayananChart extends ChartWidget
{
    protected static ?string $heading = 'Jenis Pelayanan Anda';

    public function getData(): array
    {
        $user = Auth::user(); // Ambil user yang sedang login


        $data = Pelayanan::where('created_by', $user->id) // Hanya data milik user yang login
        ->selectRaw('jenis_pelayanan, COUNT(*) as total')
        ->groupBy('jenis_pelayanan')
        ->pluck('total', 'jenis_pelayanan')
        ->toArray();
        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'label' => 'Jumlah Pelayanan',
                    'data' => array_values($data),
                    'backgroundColor' => [
                        '#0D9488',
                        '#CA8A04',
                        '#FFCE56',
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Atau 'pie' jika Anda ingin menggunakan pie chart
    }
}
