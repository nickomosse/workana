<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;

class Package extends Model
{
    public function rooms() {
        return $this->belongsToMany(Room::class);
    }
}
