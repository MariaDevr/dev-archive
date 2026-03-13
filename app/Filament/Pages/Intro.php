<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Intro extends Page
{
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Inicio';
    protected static string $view = 'filament.pages.intro';

}
