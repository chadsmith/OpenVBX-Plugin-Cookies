<?php
$number = 'voice' == AppletInstance::getFlowType() ? normalize_phone_to_E164($_REQUEST['Caller']) : normalize_phone_to_E164($_REQUEST['From']);

PluginData::delete('cookies'.$number);

$response = new Response();

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();