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

    public $sources = array(
        0 => array(
            'title' => 'Crimen Punsum',
            'real_title' => 'Crime and Punishment',
            'anchor' => 'crimenpunsum',
            'source' => '/source/pg2554.txt'),
        1 => array(
            'title' => 'Studmen Scarlem',
            'real_title' => 'A Study in Scarlet',
            'anchor' => 'studmenscarlem',
            'source' => '/source/pg244.txt'),
        2 => array(
            'title' => 'Tailem Twosum',
            'real_title' => 'A Tail of Two Cities',
            'anchor' => 'tailemtwosum',
            'source' => '/source/pg98.txt')
    );


    public function __construct(){
        $this->validator = new Validator();
    }

    public function getData($id = false){

        if(!isset($id)) {
            return false;
        }

        if($this->validator->checkID($this->sources, $id)){

            return $this->sources[$id];

        }elseif($id == 'all'){

            return $this->sources;

        } else {

            return false;

        }


    }

    public function getSentence($source_path = null){

        if(null == $source_path){
            return "No source supplied :(";
        }

        return $this->validator->cleanResponse($this->randomize($this->parseFile($source_path)));


    }

    /**
     * Accepts a source path, loads the file, then explodes it into an array
     *
     * TODO Only working off full stops, could be more graceful
     *
     * @param $source_path
     *
     * @return array
     */
    private function parseFile($source_path){

        $source_path = $_SERVER['DOCUMENT_ROOT'] . $source_path;

        $source = file_get_contents($source_path);

        return explode('.', $source);

    }

    /**
     * Takes the exploded array from parseFile and returns a
     * key => value pair that passes checkStringIntegrity
     * @param $exploded
     *
     * @return mixed
     */
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