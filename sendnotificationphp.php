<?php

// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyCcyf1zXyHvSOlxkgd0aQC4En-s7v1OADA' );


$registrationIds = array('APA91bGaFHMAYfbs3WmN16ayK8nFWE1VeNBtVC-VyuRl4m60V6Eb3JYDvCSoE_7Qb88ytK-9W_pXHDsQylZxcrPH5iiVGYHebfnw1rddy3TSuSpSFWNLnbopiZra_IfHUuZekDJoeaYf', 
		'APA91bG7bX47QpKdgP6rMm5Q1TU0zMOWypGqAJ5VVEUOcj0KFPSda2a1UNwVnELXHJNGOXck0Iu5El8EcsZN9gsL1x1_01gjj_D7UO87L2meCqAOds8Z29eouXP5o_X0nIMMNf9Y33IC');

// prep the bundle
$msg = array
(
	'message' 	=> 'here is a message. message two',
	'title'		=> 'This is a title. title two',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);

$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;