<?php

return [
	'name' => 'Website',
	'short_name' => 'Dhiatek Web',
	'client_name' => 'Dhiatek Indo Jaya',
	'client_short_name' => 'DH',
	'cdn_url'=>'//cdn.lipi.go.id',
	"list_api" => [
		"api_lipi" => [
			"client_id" => "hrms-lipi",
			"client_secret" => "3112b36d-c8b5-4573-ba34-1558e277379f",
			"redirect" => PHP_SAPI === 'cli' ? env('APP_URL') . "/sso_lipi/callback" : url('sso_lipi/callback')
		]
	],
	'simpeg' => [
		'name' => 'website dhiatek'
	]
];
