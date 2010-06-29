<?php
session_name('OpenVBX-Plugin-Cookies');
session_start();

$name = AppletInstance::getValue('name');
$value = AppletInstance::getValue('value');
$continue = false;

if(!is_null($name)&&($value==$_SESSION[$name]||('not null'==strtolower($value)&&isset($_SESSION[$name]))||('null'==strtolower($value)&&!isset($_SESSION[$name]))))
	$continue = true;

$response = new Response();

if($continue){
	$pass = AppletInstance::getDropZoneUrl('pass');
	if(!empty($pass))
		$response->addRedirect($pass);
}
else{
	$fail = AppletInstance::getDropZoneUrl('fail');
	if(!empty($fail))
		$response->addRedirect($fail);
}

$response->Respond();