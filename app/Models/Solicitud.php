<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    

    public function users(){
        return $this->belongsTo('App\Models\Users');
    }

    public function infoAcademica(){
        return $this -> hasOne(InfoAcademica::class);
    }

    public function infoDocente(){
        return $this -> hasOne(InfoDocente::class);
    }

    public function infoInstancia(){
        return $this -> hasOne(InfoInstancia::class);
    }

    public function carrera(){
        return $this -> hasOne(Carrera::class);
    }
}
