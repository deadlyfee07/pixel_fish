<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiRod extends Model
{
    protected $fillable = ['rod_name', 'upgrade_level', 'requirements', 'gem_cost'];
}
