<?php

namespace App\Enums;

class UserRole
{
    const ADMIN = "admin";
    const WRITER = "writer";
    const TYPES = [
        self::ADMIN,
        self::WRITER,
    ];
}
