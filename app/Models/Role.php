<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const ADMIN   = 1;
    public const MANAGER = 2;
    public const USER    = 3;
}
