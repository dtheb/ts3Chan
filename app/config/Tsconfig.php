<?php

return array(
	// Connction settings
    'host'	=> '127.0.0.1',		// Server address.
    'user'	=> 'Ts3ChanV2',		// Query username.
    'pass'	=> 'My53cr3tp455',	// Query password.
	'qPort'	=> '10011',			// Query port.
	'sPort'	=> '9987',			// Voice port.	
	'nick'	=> 'Ts3ChanV2',		// Bot Nickname.

	// Channel settings
    'base'      	=> '250',		// BASE Channel ID The channels will be created ABOVE this channel.
    'chanAdmin'		=> '75',		// Channel admin group ID.
	'spacer'		=> '─',			// Spacer channel name Example:('[*cspacer222]—' the '—' part of the spacer).
	'spacerOper'	=> '*',			// Spacer operator (c: center, l: left, r:right and *: for reapeated).

	// Permissions... List the custom Channel Permissions in the array 
	'permissions' => [
		// 'i_channel_needed_modify_power' => 75,
		]
	);

