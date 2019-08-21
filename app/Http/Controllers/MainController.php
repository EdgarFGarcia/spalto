<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User_Model;
use App\Models\jay;

class MainController extends Controller
{
    //
    public function saoy(){

    	$getUsers = User_Model::getUsers();
    	return view('index')->with('in', $getUsers);

    }

    public function addUser(Request $request){
    	// return $request;
    	$addUser = User_Model::addUser($request);
    	if($addUser){
    		return response()->json([
    			'success' => true
    		]);
    	}else{	
    		return response()->json([
    			'success' => false
    		]);
    	}
    }

    public function getAccesslevels(){
    	return $accesslevel = jay::getAccesslevels();

    	$contents = "";

    	foreach($accesslevel as $out){
    		$contents .= "
    			<option id='".$out->id."'>".$out->access_name."</option>
    		";
    	}

    	return $contents;

    }
}
