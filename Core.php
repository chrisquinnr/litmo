<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 19/02/15
 * Time: 21:05
 */

require_once 'Validator.php';

class Core {

    public $validator;

    public function __construct(){
        //'pg2554.txt'
        //'pg98.txt'
        $this->validator = new Validator();
    }

    public function getSentence($source_path = null){
        if(null == $source_path){
            return "No source supplied :(";
        }

        if($this->validator->checkFile($source_path)){
            return $this->randomize($this->parseFile($source_path));
        }


    }

    private function parseFile($source_path){

        $source = file_get_contents($source_path);

        return explode('.', $source);

    }

    private function randomize($exploded){

        $pass = false;

        while($pass == false){
            $id = rand(0, (count($exploded)-1));

            if($this->validator->checkStringIntegrity($exploded[$id])){
                $pass = true;
            }
        }

        return $exploded[$id];

    }

}