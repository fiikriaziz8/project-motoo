<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nama_Aplikasi',
        'User_Guide',
        'Technical_Document',
        'Category   ',
        'Login',
        'Device',
        'Description',
        'Platform',
        'DB_Prod',
        'DB_Dev',
        'Server_Dev',
        'Username_Aplikasi',
        'Password_Aplikasi',
        'Enviroment_Aplikasi',
        'Notes_Aplikasi'
    ];
    
    public function users(): BelongsToMany{
        return $this->belongsToMany(
            User::class, 'application_teknisis', 'application_id', 'user_id'
        );
    }
}

