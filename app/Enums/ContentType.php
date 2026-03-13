<?php

namespace App\Enums;

enum ContentType: string
{
    case CODE = 'code';
    case VIDEO = 'video';
    case ARTICLE = 'article';
    case BOOK = 'book';
    case COURSE = 'course';

    public function label(): string
    {
        return match($this) {
            self::CODE => 'Código',
            self::VIDEO => 'Vídeo',
            self::ARTICLE => 'Artigo',
            self::BOOK => 'Livro',
            self::COURSE => 'Curso',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case) => [
                $case->value => $case->label()
            ])
            ->toArray();
    }
}
