<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['id','codigo','producto','precio','stock','idProveedores'];
}
