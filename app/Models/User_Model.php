<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class User_Model extends Model
{
    //
    protected $table = 'users';

    public static function getUsers(){

    	return User_Model::get();
    	
    	// return $query = DB::connection('mysql')
    	// ->table('users')
    	// ->get();

    }

    public static function addUser($data){

    	return User_Model::insert([
    		'firstname' => $data->fname,
    		'middlename' => $data->mname,
    		'lastname' => $data->lname,
    		'phoneNumber' => $data->pnumber,
    		'access_levels_id' => $data->accessLevels
    	]);

    }
}
