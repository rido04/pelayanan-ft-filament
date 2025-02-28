<?php

namespace App\Filament\Pages;

use Filament\Widgets\AccountWidget;
use App\Filament\Widgets\CustomFooter;
use App\Filament\Widgets\JenisPelayananChart;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Resources\RekapResource\Widgets\RekapChart;
use App\Filament\Resources\PelayananResource\Widgets\PelayananChart;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            AccountWidget::class,
            CustomFooter::class, // Footer yang sudah kita buat
            PelayananChart::class, // Chart yang kamu pakai

        ];
    }
}
