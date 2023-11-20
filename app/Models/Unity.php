<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Unity extends Model
{
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
