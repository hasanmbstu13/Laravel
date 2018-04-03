<?php 

namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;

class Reply
{
	/**
	 * Return success response
	 * @param $messages
	 * @return array
	 */
	public static function success($messages){
		return [
		    "status" => "success",
		    "message" => trans($message)
		];
	} 

	public static function error($messages){
		return [
			"status" => "error",
			"message" => trans($messages)
		];
	}

}