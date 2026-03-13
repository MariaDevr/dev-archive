<?php


namespace App\Enums;

enum ContentStatus: string
{
    case TODO = 'todo';
    case LEARNING = 'learning';
    case DONE = 'done';

    public function label(): string
    {
        return match ($this) {
            self::TODO => 'Para estudar',
            self::LEARNING => 'Estudando',
            self::DONE => 'Finalizado',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn($case) => [
                $case->value => $case->label()
            ])
            ->toArray();
    }
}
