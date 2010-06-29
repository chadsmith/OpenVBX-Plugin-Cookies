<?php
session_name('OpenVBX-Plugin-Cookies');
session_start();
session_unset();
session_destroy();

$response = new Response();

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();