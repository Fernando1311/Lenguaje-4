<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    public function eventos(){
        $this->belongsTo(Contacto::class);
    }
    public function notas(){
        $this->belongsTo(Contacto::class);
    }
}
