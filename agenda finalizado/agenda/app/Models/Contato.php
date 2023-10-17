<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;

class Contato extends Model
{
    use HasFactory;
    protected $fillable = ["nome","numero1"];
    public $timestamps = false;

    public function telefones(){
        return $this->hasMany(Telefone::class, 'contatos_id');
}

}