<?php

use App\Models\User;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Http\Middleware\RequirePassword;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

return [
    'id' => 'cs',
    'path' => 'cs', // URL panel CS: /cs
    'domain' => null,

    'middleware' => [
        'web',
        StartSession::class,
        ShareErrorsFromSession::class,
        Authenticate::class . ':cs', // Hanya role CS yang bisa masuk
        DispatchServingFilamentEvent::class,
        DisableBladeIconComponents::class,
    ],

    'auth' => [
        'guard' => 'web',
        'pages' => [
            'login' => \Filament\Http\Livewire\Auth\Login::class,
        ],
    ],

    'resources' => [],
    'widgets' => [],
    'pages' => [],
];
