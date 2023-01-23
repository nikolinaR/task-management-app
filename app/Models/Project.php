<?php

namespace App\Models;

use App\Enums\ProjectStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    protected $fillable = ['title', 'description', 'status', 'start_date', 'end_date', 'user_id', 'category_id'];

    protected $casts = [
        'status' => ProjectStatusEnum::class
    ];

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

//    public function owner()
//    {
//        return $this->belongsTo('User', 'owner');
//    }
//
//    public function members()
//    {
//        return $this->belongsToMany('User');
//    }

    public function getTask()
    {
        return $this->hasMany('App\Models\Task', 'project_id', 'id');
    }
}

