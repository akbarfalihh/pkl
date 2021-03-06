<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'username', 'email', 'password', 'level', 'validasi', 'req_akses', 'akses' ];
}
