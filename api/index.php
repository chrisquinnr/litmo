<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 21/02/15
 * Time: 12:06
 */
require_once 'CoreAPI.php';


$api = new CoreAPI($_GET['action'], $_GET['id']);

print_r($api);
echo 'API';

