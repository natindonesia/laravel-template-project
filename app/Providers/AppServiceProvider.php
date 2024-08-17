<?php

namespace App\Providers;

use BezhanSalleh\PanelSwitch\PanelSwitch;
use Filament\Support\Components\Component;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            $panelSwitch->canSwitchPanels(fn () => auth()->check() && auth()->user()->is_admin);
            $panelSwitch->visible(fn () => auth()->check() && auth()->user()->is_admin);
            $panelSwitch->simple();
        });


        Component::configureUsing(function (Component $component): void {
            //check if method translateLabel exists
            if (method_exists($component, 'translateLabel')) {
                $component->translateLabel();
            }
        });
        Table::configureUsing(function (Table $table) {
            $table->paginationPageOptions(function (Table $table) {
                // (25,50,75,100 ALL) for non card
                // (15,30,45,60,90 ALL) for card
                $isCard = false;
                foreach ($table->getColumnsLayout() as $column) {
                    if ($column instanceof Stack) {
                        $isCard = true;
                        break;
                    }
                }
                return $isCard ? [15, 30, 45, 60, 90, 'all'] : [25, 50, 75, 100, 'all'];
            });
        });
    }
}
