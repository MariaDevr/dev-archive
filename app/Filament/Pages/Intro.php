<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Intro extends Page
{
    protected ?string $heading = '';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Inicio';
    protected static string $view = 'filament.pages.intro';
    public function getFavorites(): Collection
    {
        return Content::where('favorite', true)->get();
    }

}
