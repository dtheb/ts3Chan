<?php

return array(
	'from' => array('noreply@example.com' => 'Ts3Chan'),
	'user' => 'user@example.com',
	'pass' => 'someuberpass',
	'smtp' => 'smtp.example.com',
	'port' => 26,
	'ssl' => false,

	// Email Templates
	// Client name = %name%
	// Channel Name = %channame%
	// Channel Name URL encoded = %channameURL%
	// Message/Reason = %msg%
	
	'msgHeadYes' => "Hello %name%,\n\nWelcome to OurCoolTeamspeakServer, We accepted you request for channel \"%channame%\" 
		\n\n---info---\nChannel: %channame%\nToken: %token%\nMessage: %msg%",

	'msgHeadNo' => "Hello %name%,\n\nWelcome to OurCoolTeamspeakServer, your channel request was rejected sorry.
		\n---info---\nChannel: %channame% \nReason: %msg%",

	'msgSig' => "Thanks\nOurCoolTeamspeakServer\nts.server-ip.com"
	);

