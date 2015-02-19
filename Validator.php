<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/02/15
 * Time: 21:05
 */
class Validator {

	public function checkFile($source_path){

		if (file_exists($source_path)) {
			return true;
		}
	}

	public function checkStringIntegrity($string = null){
		if(null == $string) return false;




		if(strlen($string) > 80){
			return true;
		}
	}

}