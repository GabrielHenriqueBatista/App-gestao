<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faturamentos extends Model
{
    use HasFactory;
    protected $fillable = ['ano','mes', 'dia','tipo','descricao','valor'];
}
