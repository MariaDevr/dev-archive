<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Course extends Page
{
    protected ?string $heading = '';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationLabel = 'Cursos';
    protected static string $view = 'filament.pages.course';
    public Collection $content;

    public function mount(): void
    {
        $this->content = Content::where('type', 'course')->get();
    }
}
