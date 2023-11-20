<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Referral;
use App\Models\Package;
use App\Models\Observation;
use App\Models\Estimate;
class Contract extends Model
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
        return $this->belongsToMany(Observation::class, 'contract_observations');
    }

    public function estimate()
    {
        return $this->belongsTo(Estimate::class);
    }
}
