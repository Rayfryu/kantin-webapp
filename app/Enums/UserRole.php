<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'ADMIN';
    case PENJUAL = 'PENJUAL';
    case SISWA = 'SISWA';
}
