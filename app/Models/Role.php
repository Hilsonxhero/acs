<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const  ROLE_SUPER_ADMIN = 'super admin';
    const  ROLE_USER = 'user';
    const  ROLE_WRITER = 'writer';


    static $roles = [
        self::ROLE_SUPER_ADMIN => [
            Permission::PERMISSION_SUPER_ADMIN
        ],
        self::ROLE_WRITER => [
            Permission::PERMISSION_MANAGE_ARTICLES
        ],
        self::ROLE_USER => [
            Permission::PERMISSION_USER
        ],

    ];
}
