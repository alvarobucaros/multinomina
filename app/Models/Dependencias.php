<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    use HasFactory;
    protected $table = "dependencias";

    protected $fillable = ['id','dep_idEmpresa','dep_nombre','dep_estado'];
}
