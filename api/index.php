<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 21/02/15
 * Time: 12:06
 */
require_once 'CoreAPI.php';

if(class_exists(CoreAPI)) {
	$api = new CoreAPI( $_GET['action'], $_GET['id'] );
} else {
	die('An error occurred loading the application');
}


