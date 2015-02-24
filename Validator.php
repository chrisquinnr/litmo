<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/02/15
 * Time: 21:05
 */
class Validator {


	/**
	 * @param $sources
	 * @param null $id
	 * @return bool
	 * @throws Exception
	 */
	public function checkID($sources, $id = null){
		if(isset($id)){
			if(is_array($sources[$id])){
				return true;
			}

		}
	}

	public function checkStringIntegrity($string = null){
		if(null == $string) return false;


		if(strlen($string) > 100){
			return true;
		} else {
			return false;
		}
	}

	public function cleanResponse($response){
		$response = str_replace(array("\r\n", "\n\r", "\r", "\n"), "", $response);
		return nl2br($response);
	}

}