<?php

namespace App\Enums;

enum TaskStatusEnum:string
{
    case Started = 'started';
    case InProgress = 'inProgress';
    case Completed = 'completed';
}
