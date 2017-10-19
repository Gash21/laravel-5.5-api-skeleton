<?php

namespace App\Traits;

use Validator;

trait ValidatorTraits {

	public function validateRegisterUser($request){
		return Validator::make($request->all(), [
				'email' => 'required|email|unique:users',
				'password' => 'required',
				'name' => 'required'
			]);
	}

}