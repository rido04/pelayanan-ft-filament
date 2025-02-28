<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\Pages\Dashboard;
use Filament\Support\Colors\Color;
use App\Filament\Widgets\CustomFooter;
use App\Filament\Resources\RekapResource;
use App\Filament\Resources\StaffCsResource;
use App\Filament\Resources\PelayananResource;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Filament\Resources\RekapResource\Widgets\RekapChart;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use App\Filament\Resources\PelayananResource\Widgets\PelayananChart;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Town Management') // Ganti nama Filament dengan teks yang diinginkan
            ->darkMode()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                \Filament\Http\Middleware\Authenticate::class,
            ])
            ->resources([
                PelayananResource::class,
                StaffCsResource::class,
                RekapResource::class,
            ])
            ->pages([
                Dashboard::class, // Pakai dashboard custom
            ])
            ->widgets([
                PelayananChart::class,
                RekapChart::class,
                CustomFooter::class,
            ]);
    }
}
