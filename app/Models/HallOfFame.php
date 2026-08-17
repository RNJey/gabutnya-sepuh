<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallOfFame extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role_title',
        'sub_group_name',
        'image_path',
    ];
}