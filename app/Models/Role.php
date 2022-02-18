<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const  ROLE_TEACHER = 'teacher';
    const  ROLE_SUPER_ADMIN = 'super admin';
    const  ROLE_STUDENT = 'student';
    const  ROLE_USER = 'user';

    static $roles = [
        self::ROLE_TEACHER => [
            Permission::PERMISSION_TEACH
        ],
        self::ROLE_SUPER_ADMIN => [
            Permission::PERMISSION_SUPER_ADMIN
        ],
        self::ROLE_STUDENT => [
            Permission::PERMISSION_STUDENT
        ],
        self::ROLE_USER => [
            Permission::PERMISSION_USER
        ],
    ];
}
