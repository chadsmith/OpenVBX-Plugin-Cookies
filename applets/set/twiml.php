<?php
session_name('OpenVBX-Plugin-Cookies');
session_start();

$names = (array) AppletInstance::getValue('names[]');
$values = (array) AppletInstance::getValue('values[]');

foreach($names as $i => $name)
	if($name)
		if(''!=$values[$i])
			$_SESSION[$name]=$values[$i];
		else
			unset($_SESSION['name']);

$response = new Response();

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();