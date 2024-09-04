<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class termo extends Model
{
    use HasFactory;
    protected $table = "banco_de_dados_termo";
    protected $fillable = ['palavras-do-termo'];
}
