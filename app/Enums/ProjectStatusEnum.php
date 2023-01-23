<?php

namespace App\Enums;

enum ProjectStatusEnum:string {
    case Passive = 'passive';
    case Active = 'active';
    case Cancelled = 'cancelled';
    case Finished = 'finished';

}
