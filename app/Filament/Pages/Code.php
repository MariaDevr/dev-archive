<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Code extends Page
{
    protected ?string $heading = '';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = "Códigos";
    protected static string $view = 'filament.pages.code';
    public Collection $content;

    public function mount(): void
    {
        $this->content = Content::where('type', 'code')->get();
    }

}
