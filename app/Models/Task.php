<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'start_date', 'due_date', 'status', 'user_id', 'project_id'];

    protected $taskStatus = [
        'status' => TaskStatusEnum::class
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function getProject()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

}
