<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Adiministrador extends authenticatable
{
    use HasFactory;
    use HasApiTokens;
    Use Notifiable;
    
    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'password'

    ];
}
