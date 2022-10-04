<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $guarded = false;
    protected $table = 'participants';

    protected $fillable = [
      'surname','name','patronym','age','phone','institute','group','project_id'
    ];
    protected $hidden = [
        'created_at','created_at'
    ];

    public function getFIO()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronym;
    }

}
