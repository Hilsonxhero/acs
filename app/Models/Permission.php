<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    const PERMISSION_MANAGE_ARTICLES = 'manage articles';
    const PERMISSION_USER = 'user';
    const PERMISSION_SUPER_ADMIN = 'super admin';

    static $permissions = [
        self::PERMISSION_SUPER_ADMIN,
        self::PERMISSION_MANAGE_ARTICLES,
        self::PERMISSION_USER,
    ];
}
