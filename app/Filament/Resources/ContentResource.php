<?php

namespace App\Filament\Resources;

use App\Enums\ContentStatus;
use App\Enums\ContentType;
use App\Filament\Resources\ContentResource\Pages;
use App\Filament\Resources\ContentResource\RelationManagers;
use App\Models\Content;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;


class ContentResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Conteúdo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informações Básicas')
                    ->schema([
                        TextInput::make('title')
                            ->label('Título')
                            ->required(),

                        Select::make('category_id')
                            ->label('Categoria')
                            ->relationship('category','name'),

                        Select::make('type')
                            ->label('Tipo')
                            ->options(ContentType::options()),

                        TextInput::make('url')
                            ->label('URL'),

                        Toggle::make('favorite')
                            ->label('Favorito'),
                    ])
                    ->columns(2),

                Section::make('Conteúdo')
                    ->schema([
                        Select::make('status')
                            ->label('Status')
                            ->options(ContentStatus::options()),

                        MarkdownEditor::make('content')
                            ->label('Conteúdo'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category.name')
                    ->label('Categoria')
                    ->sortable()
                    ->searchable(),

                BadgeColumn::make('type')
                    ->label('Tipo')
                    ->formatStateUsing(fn ($state) => ContentType::from($state)->label()),

                IconColumn::make('favorite')
                    ->label('Favorito')
                    ->icon('heroicon-o-star')
                    ->boolean(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state) => ContentStatus::from($state)->label()),

                TextColumn::make('url')
                    ->label('URL')
                    ->limit(30)
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('type'),
                SelectFilter::make('category'),
                TernaryFilter::make('favorite'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContent::route('/create'),
            'edit' => Pages\EditContent::route('/{record}/edit'),
        ];
    }
}
