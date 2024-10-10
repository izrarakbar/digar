<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem; // Tambahkan ini
use App\Filament\Resources\PageResource;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\HomePageSettings;
use App\Filament\Resources\SuratKptsResource;
use App\Filament\Resources\SuratNotulenResource;
use App\Filament\Resources\SuratPaktaResource;
use App\Filament\Resources\SuratPemberitahuanResource;
use App\Filament\Resources\SuratPerdirResource;
use App\Filament\Resources\SuratSeResource;
use App\Filament\Resources\UserResource;
use App\Models\SuratSe;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
                Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->plugin(FilamentSpatieRolesPermissionsPlugin::make())
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make('Source')
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
                                ->url(fn(): string => Pages\Dashboard::getUrl()), // Pastikan ini sesuai
                        ]),
                    NavigationGroup::make('Surat')
                        ->items([
                            ...SuratSeResource::getNavigationItems(),
                            ...SuratPerdirResource::getNavigationItems(),
                            ...SuratKptsResource::getNavigationItems(),
                            ...SuratPemberitahuanResource::getNavigationItems(),
                            ...SuratPaktaResource::getNavigationItems(),
                            ...SuratNotulenResource::getNavigationItems(),
                        ]),
                    NavigationGroup::make('User')
                        ->items([
                            ...UserResource::getNavigationItems(),

                            NavigationItem::make('Roles')
                                ->icon('heroicon-o-user-group')
                                ->isActiveWhen(fn(): bool => request()->routeIs([
                                    'filament.admin.resources.roles.index',
                                    'filament.admin.resources.roles.create',
                                    'filament.admin.resources.roles.view',
                                    'filament.admin.resources.roles.edit',
                                ]))
                                ->url(fn(): string => '/admin/roles'),

                            NavigationItem::make('Permissions')
                                ->icon('heroicon-o-lock-closed')
                                ->isActiveWhen(fn(): bool => request()->routeIs([
                                    'filament.admin.resources.permissions.index',
                                    'filament.admin.resources.permissions.create',
                                    'filament.admin.resources.permissions.view',
                                    'filament.admin.resources.permissions.edit',
                                ]))
                                ->url(fn(): string => '/admin/permissions'),
                        ]),
                ]);
            });
    }
}
