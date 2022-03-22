<?php

namespace Codedcell\ViewCreator\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];
}
