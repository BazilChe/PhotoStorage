<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function photos() {
        return $this->belongsToMany(Photo::class);
    }
}
