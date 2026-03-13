<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Course extends Page
{
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Cursos';

    protected static string $view = 'filament.pages.course';
}
