<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model {
    protected $fillable = [
        'contractor_id',
        'contracted_id',
        'descricao_servico',
        'status',
    ];

    public function contractor()
    {
        return $this->belongsTo(User::class, 'contractor_id');
    }

    public function contracted()
    {
        return $this->belongsTo(User::class, 'contracted_id');
    }
}