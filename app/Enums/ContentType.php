<?php

namespace App\Enums;

use App\Models\Content;

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

    public static function values(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
           $count =  Content::where('type', $case->value)->count();
           $array[$case->value] = $count;
        }
        return   $array;

    }
}
