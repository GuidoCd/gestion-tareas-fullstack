<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    public function tasks(): hasMany
    {
        return $this->hasMany(Task::class);
    }
}
