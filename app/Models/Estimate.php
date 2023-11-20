<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Referral;
use App\Models\Package;
use App\Models\Observation;


class Estimate extends Model
{
    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function observations()
    {
        return $this->belongsToMany(Observation::class, 'estimate_observations');
    }
}
