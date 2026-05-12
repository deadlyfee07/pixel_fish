<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiBait extends Model
{
    protected $fillable = ['item_name', 'main_target', 'bonus_target'];
}
