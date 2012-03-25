<?php
/**
 * Config file for service to process requests from buttons and panels.
 *
 * There are currently 2 service types support: MQTT and HTTP. They have
 * different configuration requirements so the parameters required are
 * different.
 *
 * The key is a compound of the panel ID and the button ID, like "2-32".
 */

$config = array();
/* ******* MQTT Example Device ****** */
$config['2-42'] = array(
		"Type" => "MQTT",
		"Topic" => "device/1/led",
		"Message" => "1",
		"Response" => "LED Green"
		);
$config['2-43'] = array(
		"Type" => "MQTT",
		"Topic" => "device/1/led",
		"Message" => "0",
		"Response" => "LED Red"
		);

/* ******* HTTP Example Device ****** */
$config['2-1'] = array(
		"Type" => "HTTP",
		"URL" => "out5On=0 http://192.168.1.21/control",
		"Response" => "Kitchen lights on"
		);
$config['2-2'] = array(
		"Type" => "HTTP",
		"URL" => "out5Off=0 http://192.168.1.21/control",
		"Response" => "Kitchen lights off"
		);

