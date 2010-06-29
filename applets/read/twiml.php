<?php
session_name('OpenVBX-Plugin-Cookies');
session_start();

$text = AppletInstance::getValue('text');

if(preg_match_all('/(%([^%]+)%)/', $text, $cookies)){
	$search = $cookies[1];
	$replace = array();
	foreach($cookies[2] as $name)
		$replace[]=$_SESSION[$name];
	$text = str_replace($search, $replace, $text);
}

$response = new Response();

if(AppletInstance::getFlowType() == 'voice')
	$response->addSay($text);
else
	$response->addSms($text);

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();