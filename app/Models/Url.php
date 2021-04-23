<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ['url','slug'];
}
