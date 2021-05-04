<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'tbl_roles';

    protected $fillable = [
        "id", "role_name","role_access" ,"role_status", "created_at", "updated_at"
    ];
}
