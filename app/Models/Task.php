<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Task extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'start_date', 'due_date', 'status', 'user_id', 'project_id'];

    protected $taskStatus = ['status' => TaskStatusEnum::class];

    // logged attributes
    protected static $logAttributes = ['status'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function getProject()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }




}
