<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Model\Users;

class UsersController extends Controller {

    public function create(Request $request) {
    	$validate = $this->validateRegisterUser($request);
    	if($validate->fails()){
    		return $this->json(422, "validation error", $validate->errors());
    	}
    	return $this->json(200, "Validation OK");
    }
}
