<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasColor;

enum StatusTransaksi: int implements HasLabel,hasColor
{
    case Pending = 0;
    case Verified = 1;
    case Proses = 2;
    case Selesai = 3;
    
    public function getLabel(): ?string
    {
        return $this->name;
        
        // or
    
        return match ($this) {
            self::Pending => 'Pending',
            self::Verified => 'Verified',
            self::Proses => 'Proses',
            self::Selesai => 'Selesai',
        };
    }
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Pending => 'gray',
            self::Verified => 'primary',
            self::Proses => 'warning',
            self::Selesai => 'success',
        };
    }
}