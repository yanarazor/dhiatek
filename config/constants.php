<?php

return [
    'role_admin' => 1,
    'cdn_themes'=>env('APP_CDN', '//cdn.lipi.go.id'),
    'api_token_url'=>'https://api.lipi.go.id/oauth2/token',
    'sso_lipi_authorization_url'=>'https://sso.lipi.go.id/authorize',
    'api_user_detail'=>'http://api.lipi.go.id/sso/user/me',
    'upload_path'=>env('APP_UPLOAD_PATH'),
	'redirect_https'=>env('REDIRECT_HTTPS'),
    'email'=>'developer@mail.lipi.go.id'
];