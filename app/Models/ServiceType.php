<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServiceType extends Model
{
    protected $table = 'service_types';

    public function services()
    {
        return $this->hasMany(Service::class);
    }

}
