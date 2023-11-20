<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unity;
use App\Models\Package;

class Room extends Model
{
    public function unity() {
        return $this->belongsTo(Unity::class);
    }

    public function packages() {
        return $this->belongsToMany(Package::class);
    }
}
