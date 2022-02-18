<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;


    const PERMISSION_MANAGE_CATEGORIES = 'manage categories';
    const PERMISSION_MANAGE_COURSES = 'manage courses';
    const PERMISSION_TEACH = 'teach';
    const PERMISSION_STUDENT = 'student';
    const PERMISSION_USER = 'user';
    const PERMISSION_SUPER_ADMIN = 'super admin';

    static $permissions = [
        self::PERMISSION_MANAGE_CATEGORIES,
        self::PERMISSION_MANAGE_COURSES,
        self::PERMISSION_TEACH,
        self::PERMISSION_STUDENT,
        self::PERMISSION_USER,
        self::PERMISSION_SUPER_ADMIN
    ];
}
