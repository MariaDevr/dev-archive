<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Video extends Page
{
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Vídeos';

    protected static string $view = 'filament.pages.video';
}
