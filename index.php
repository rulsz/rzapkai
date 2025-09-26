<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://open-ai21.p.rapidapi.com/conversationllama",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'messages' => [
				[
								'role' => 'user',
								'content' => 'hello'
				]
		],
		'web_access' => null
	]),
	CURLOPT_HTTPHEADER => [
		"Content-Type: application/json",
		"x-rapidapi-host: open-ai21.p.rapidapi.com",
		"x-rapidapi-key: 396295708cmshe80aa0e7f31375cp13b78cjsncd407ac19874"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
