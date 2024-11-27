<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'descricao_perfil',
        'user_rating',
        'CLIENTE_DATA_NASC',
        'CLIENTE_TEL',
        'CLIENTE_CPF',
        'CLIENTE_ENDERECO',
        'CLIENTE_CEP',
        'CLIENTE_CIDADE',
        'CLIENTE_ESTADO',
        'CLIENTE_PAIS',
        'CLIENTE_IP',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function allContracts() {
        return $this->hasMany(Contract::class, 'contracted_id');
    }

    public function acceptedContracts() {
        return $this->hasMany(Contract::class, 'contracted_id')->where('status', 'aceito');
    }

    public function requestedContracts() {
        return $this->hasMany(Contract::class, 'contractor_id');
    }
}