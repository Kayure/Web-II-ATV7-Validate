<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    use HasFactory;
    protected $fillable = ['nome', 'email'];

    public function endereco() {
        return $this->belongsTo('\App\Models\Endereco');
    }
}
