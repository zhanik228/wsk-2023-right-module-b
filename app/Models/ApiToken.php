<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'workspace_id',
        'name',
        'token',
        'created_at',
        'updated_at',
        'revoked_at'
    ];
}
