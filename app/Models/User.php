<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'no_hp',
        'password',
        'role',
        'nama_lengkap',
        'male',
        'photo',
        'married',
        'pendidikan',
        'tgl_lahir',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'male' => 'boolean',
            'married' => 'boolean',
            'tgl_lahir' => 'date',
        ];
    }

    // === RELATIONS ===
    public function instruktur()
    {
        return $this->hasOne(Instruktur::class, 'id_user');
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class, 'id_user');
    }

    public function penilaians()
    {
        return $this->hasMany(Penilaian::class, 'id_user');
    }

    // === HELPER METHODS ===
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isInstruktur()
    {
        return $this->role === 'instruktur';
    }

    public function isPeserta()
    {
        return $this->role === 'peserta';
    }
}