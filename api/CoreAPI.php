<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 21/02/15
 * Time: 09:59
 */

require_once '../Core.php';

class CoreAPI {

// This is the API, 2 possibilities: show the app list or show a specific app by id.
// This would normally be pulled from a database but for demo purposes, I will be hardcoding the return values.

	public $core;

	public $allowed = array('litmo', 'id');

	public function __construct($action = null, $id = null){

		if(!$action) {
			return false;
		}

		$this->core = new Core();

		//$action = $_GET['action'];

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
						//return JSON array
						break;
				}

				$return = $this->core->validator->cleanResponse($return);

				exit($return);
			}
		}

	}

	/**
	 *
	 * Returns a random string from a random source
	 *
	 * @param null $id
	 * @return array
	 */
	private function getLitmo(){

		$config = $this->core->getData('all');

		$count = count($config);
		$id = rand(0, $count-1);

		return $this->core->getSentence($config[$id]['source']);

	}

	private function getFromID($id = null){

		if($this->core->validator->checkID($this->core->sources, $id)){
			$config = $this->core->getData($id);
		}
		return $this->core->getSentence($config['source']);

	}

}
?>