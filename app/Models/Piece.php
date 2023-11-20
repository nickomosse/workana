<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $table = 'pieces';

    public function children() {
        return $this->hasMany(Piece::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(Piece::class, 'parent_id');
    }

    public function level()
    {
        $level = 0;
        $parent = $this->parent;
        while ($parent) {
            $level++;
            $parent = $parent->parent;
        }
        return $level;
    }
}
