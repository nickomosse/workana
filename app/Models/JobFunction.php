<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class JobFunction extends Model
{
    protected $table = 'job_functions';

    public function employees() {
        return $this->belongsToMany(Employee::class);
    }
}
