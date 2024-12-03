<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deportes extends Model
{
    use HasFactory;
    protected $table ='deportes';
    protected $fillable = ['nombre'];
}