<?php

namespace App\Enums\Banda;

enum StatusBanda: string
{
    case ATIVO = "A";
    case INATIVO = "I";

    public function getColorStatus(): string {
        return match($this) {
            self::ATIVO => 'text-green-600',
            self::INATIVO => 'text-red-600',
        };
    }
}
