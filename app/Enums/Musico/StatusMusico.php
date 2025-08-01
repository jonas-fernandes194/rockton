<?php

namespace App\Enums\Musico;

enum StatusMusico: string
{
    case Ativo = "A";
    case Inativo = "I";

    public function getColorStatus(): string {
        return match($this) {
            self::Ativo => 'inline-block text-green-700 bg-green-100 border border-green-300 rounded-lg px-3 py-1 mt-2',
            self::Inativo => 'inline-block text-red-700 bg-red-100 border border-red-300 rounded-lg px-3 py-1 mt-2',
        };
    }
}
