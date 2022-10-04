<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = false;
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'age',
        'thematic_direction',
        'link',
        'group',
        'institute',
        'exec_fio',
        'exec_dolj',
        'phone',
        'user_id',
        'file'
    ];
    protected $hidden = [
        'created_at'
    ];
    function getThematicDirection(){
        $model = \App\Models\ThematicDirection::where('id', $this->thematic_direction)->first();
        if ($model){
            return $model->title;
        }else{
            return "ERROR: Данного направления не существует.";
        }
    }
    function getStatus(){
        $status = \App\Models\ProjectStatus::where('id', $this->status)->first();
        return $status->name;
    }
}
