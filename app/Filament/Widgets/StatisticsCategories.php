<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Content;
use Filament\Widgets\ChartWidget;
use App\Enums\ContentType;

class StatisticsCategories extends ChartWidget
{
    protected static ?string $heading = 'Estatisticas por categoria';
    protected function getData(): array
    {

        $stats = ContentType::values();

        return [

            'labels' => array_values(ContentType::options()),

            'datasets' => [
                [
                    'label' => 'Total de Conteúdos',
                    'data' => array_values($stats),
                    'backgroundColor' => [
                        '#4F46E5',
                        '#10B981',
                        '#F59E0B',
                        '#EF4444',
                    ],
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}
