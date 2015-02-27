<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/02/15
 * Time: 21:05
 */
class Validator {


	/**
	 * Needs to be a valid ID
	 *
	 * @param $sources
	 * @param null $id
	 * @return bool
	 */
	public function checkID($sources, $id = null){
		if(isset($id)){
			if(is_array($sources[$id])){
				return true;
			} else {
				return false;
			}

		}
	}

	/**
	 *
	 * Pass / fail assessment of quality of a string, based on defined rules.
	 *
	 * Currently only criteria is length.
	 *
	 * @param null $string
	 *
	 * @return bool
	 */
	public function checkStringIntegrity($string = null){
		if(null == $string) return false;


		if(strlen($string) > 100){
			return true;
		} else {
			return false;
		}
	}

	/**
	 *
	 * Combination of str_replace and nl2br to catch all formatting oddities
	 * @param $response
	 *
	 * @return string
	 */
	public function cleanResponse($response){

		$response = str_replace(array("\r\n", "\n\r", "\r", "\n"), " ", $response);
		return nl2br($response);

	}

}