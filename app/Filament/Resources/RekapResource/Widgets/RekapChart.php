<?php


namespace App\Filament\Resources\RekapResource\Widgets;

use App\Models\Pelayanan;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\BarChartWidget;
use Illuminate\Support\Facades\Auth;

class RekapChart extends ChartWidget
{
    protected static ?string $heading = 'Rekap Data';

    protected function getData(): array
    {

        $data = Pelayanan::selectRaw('jenis_pelayanan, COUNT(*) as total')
            ->groupBy('jenis_pelayanan')
            ->pluck('total', 'jenis_pelayanan');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pelayanan',
                    'data' => $data->values(),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56'],
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    public function getType(): string
    {
        return 'bar';
    }

    public static function canView(): bool
    {
        return Auth::check(); // Memastikan hanya user yang login bisa melihat chart
    }
}
