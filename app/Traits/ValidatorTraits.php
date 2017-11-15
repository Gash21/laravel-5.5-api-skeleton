<?php

namespace App\Traits;

use Validator;

/**
 * Validator Traits
 * Include this traits to base controller to use
 * 
 * @version 1.0.0 Original Version
 * @author Galih Arghubi <galiharghubi@gmail.com>
 * @copyright 2017 Galih Arghubi
 */
trait ValidatorTraits {

	/**
	 * validateRegisterUser 
	 * Custom User Validator
	 * 
	 * @param  Request $request 
	 * @return \Validator
	 */
	public function validateRegisterUser($request){
		return Validator::make($request->all(), [
				'email' => 'required|email|unique:users',
				'password' => 'required',
				'name' => 'required'
			]);
	}

}