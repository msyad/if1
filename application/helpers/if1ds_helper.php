<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function clean($str){
	$str = str_replace(array("'", "-", "=", '"', '<', '>', '\\', '/', '+'), '', $str);

	return $str;
}