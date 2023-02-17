<?php

namespace Mastashake\LaravelOpenaiApi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
      'data' => 'array'
    ];
}
