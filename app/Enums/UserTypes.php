<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum UserTypes: string implements HasLabel
{
    case ADMIN = 'admin';
    case MARKETER = 'marketer';
    case VIEWER = 'viewer';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::MARKETER => 'Marketer',
            self::VIEWER => 'Viewer',
        };
    }
}
