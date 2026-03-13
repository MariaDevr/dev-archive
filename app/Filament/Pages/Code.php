<?php

namespace App\Filament\Pages;

use App\Filament\Resources\ContentResource;
use App\Models\Content;
use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;

class Code extends Page implements Tables\Contracts\HasTable
{
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationLabel = "Códigos";
    protected static string $view = 'filament.pages.code';
    use Tables\Concerns\InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Content::query()->where('type', 'code'));
    }

}
