<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;

    protected $table='recurso';
    protected $primaryKey='idrecurso';
    public $timestamps=false;
    protected  $fillable=['denominacion','costo','stock','tipo','control','medida', 'idproveedor'];


}

