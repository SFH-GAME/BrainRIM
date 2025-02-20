<?php
$client_id = '54773513779-vb7qo0htcuup6d327itpl4amtuh8st6e.apps.googleusercontent.com';
$redirect_uri = 'https://brainrim.site/pages/page-registration/google-callback.php';

$params = [
    'response_type' => 'code',
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'scope' => 'email profile',
    'access_type' => 'offline',
    'prompt' => 'consent'
];

header('Location: https://accounts.google.com/o/oauth2/auth?' . http_build_query($params));
exit();
?>
