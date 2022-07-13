<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veterinario extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'crmv','especialidade_id'];

    public function especialidade(){
        return $this->belongsTo('App\Models\Especialidade');
    }
}
