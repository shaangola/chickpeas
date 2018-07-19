<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $guarded = ['id'];

    public function children() {
		return $this->hasMany(self::class, 'parent_id');
	  }
}
