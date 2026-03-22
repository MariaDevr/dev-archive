<?php

namespace App\Filament\Pages;

use App\Models\Content;
use Filament\Pages\Page;
use Illuminate\Support\Collection;

class Video extends Page
{
    protected ?string $heading = '';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationLabel = 'Vídeos';
    protected static string $view = 'filament.pages.video';
    public Collection $content;

    public function mount(): void
    {
        $this->content = Content::where('type', 'video')->get();
    }
}
