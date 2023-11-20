<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceType;

class Service extends Model
{
    protected $table = 'services';

    public function serviceType() {
        return $this->belongsTo(ServiceType::class);
    }
}
