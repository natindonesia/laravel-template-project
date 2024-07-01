<?php

namespace App\Filament\User\Widgets;

use App\Models\Todo;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TodoStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalTodos = Todo::where('user_id', auth()->id())->count();
        return [
            Stat::make(__('Total Todos'), $totalTodos),
        ];
    }


}
