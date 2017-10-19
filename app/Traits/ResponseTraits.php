<?php
namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

trait ResponseTraits {

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

	private static function timestamp(){
		return Carbon::now()->timestamp;
	}

}