<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThematicDirection extends Model
{
    use HasFactory;
    public $timestamps = FALSE;
    protected $guarded = false;
    protected $table = 'thematic_directions';
}
