<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jay extends Model
{
    //
    protected $table = 'access_levels';

	public static function getAccesslevels(){
		return jay::get();
	}


}
