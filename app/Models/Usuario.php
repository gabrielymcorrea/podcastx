<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    //para nao deletar no banco de dados quando o usuario deletar a conta
    use SoftDeletes;

    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'email',
        'password',
        'name'
    ];
}
