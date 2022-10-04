<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'projects_status';
    public $timestamps = FALSE;
    protected $fillable = [
        'name'
    ];
}
