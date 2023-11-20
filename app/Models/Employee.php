<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobFunction;

class Employee extends Model
{
    protected $table = 'employees';

    public function jobfunctions() {
        return $this->belongsToMany(JobFunction::class, 'employee_functions', 'employee_id', 'function_id');
    }
}
