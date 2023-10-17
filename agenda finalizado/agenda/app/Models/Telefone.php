<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Apps\Models\Contato;

class Telefone extends Model
{
    use HasFactory;
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function contato(){
        return $this->belongsTo(Contato::class);
    }
}
