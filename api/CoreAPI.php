<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 21/02/15
 * Time: 09:59
 */

require_once '../Core.php';

class CoreAPI {

	public $core;

	public $allowed = array('litmo', 'id');

	public function __construct($action = null, $id = null){

		$this->core = new Core();

		if($action){
			if(in_array($action, $this->allowed)){
				switch ($action) {

					case 'id':

						if(!isset($id)){
							exit('No id supplied');
						}

						$return = $this->getFromID($id);

						break;

					case 'random':
					default :
						$return = $this->getLitmo();

						break;
				}

				$return = $this->core->validator->cleanResponse($return);

				exit($return);

			} else {
				exit('Not a valid action');
			}
		} else {
			exit('No action provided');
		}

	}

	/**
	 *
	 * Returns a random string from a random source
	 *
	 * @return array
	 */
	private function getLitmo(){

		$config = $this->core->getData('all');

		$count = count($config);
		$id = rand(0, $count-1);

		return $this->core->getSentence($config[$id]['source']);

	}

	/**
	 * Returns a random string from a specified source
	 *
	 * @param null $id
	 * @return string
	 */
	private function getFromID($id = null){

		if($this->core->validator->checkID($this->core->sources, $id)){
			$config = $this->core->getData($id);
		}
		return $this->core->getSentence($config['source']);

	}

}
?>