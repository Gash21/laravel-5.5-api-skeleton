<?php
namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

/**
 * Response Traits
 * Include this traits to base controller to use
 *  
 * @version 1.0.0 Original Version
 * @author Galih Arghubi <galiharghubi@gmail.com>
 * @copyright 2017 Galih Arghubi
 */
trait ResponseTraits {

	/**
	 * json
	 * This function will format json response automatically
	 * with pre-designed format.
	 * Use this on JSON returned function 
	 * 
	 * @param  Integer $statusCode
	 * @param  Object $data
	 * @param  Object $error
	 * @return JsonResponse
	 */
	public function json($statusCode, $data = null, $error = null){
		$processTime = microtime(true) - LARAVEL_START;
		$response = array(
			'status_code' => $statusCode,
			'status_msg' => empty($error) ? 'success' : 'error',
			'timestamp' => $this->timestamp(),
			'execution_time' => $processTime,
			'data' => $data,

		);

		if(gettype($data) == "array"){
			$response['size'] = sizeof($data);
		}

		if(!empty($error)){
			$response['error'] = $error;
		}

		Log::info("RESPONSE :", $response);
		Log::info("RESPONSE PROCESS TIME : " . $processTime);

		return response()->json($response, $statusCode);
	}

	/**
	 * Generate timestamp to use
	 * @return Integer
	 */
	private static function timestamp(){
		return Carbon::now()->timestamp;
	}

}