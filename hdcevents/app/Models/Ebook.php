<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    protected $table = 'ebooks';

    protected $fillable = ['slug', 'nome', 'autor', 'lançamento', 'paginas', 'sinopse', 'id_user', 'id_categoria'];
}