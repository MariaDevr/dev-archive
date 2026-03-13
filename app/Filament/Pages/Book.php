<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Book extends Page
{
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Livros';


    protected static string $view = 'filament.pages.book';
}
