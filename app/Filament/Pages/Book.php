<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Book extends Page
{
    protected ?string $heading = '';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationLabel = 'Livros';
    protected static string $view = 'filament.pages.book';
    public Collection $content;

    public function mount(): void
    {
        $this->content = Content::where('type', 'book')->get();
    }
}
