<?php

namespace  php\library;

use Google\Client;
use GuzzleHttp\Client as GuzzleClient;

class GoogleClient
{
    public readonly Client $client;


    public function __construct()
    {
        $this->client = new Client;
    }

    public function init()
    {
        $guzzleClient = new GuzzleClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig(config: 'credentials.json');
        $this->client->setRedirectUri(redirectUri: 'http://localhost/git_tcc/TCC/');
        $this->client->addScope(scope_or_scopes: 'email');
        $this->client->addScope(scope_or_scopes: 'profile');
    }

    public function generateAuthLink()
    {
        return  $this->client->createAuthUrl();
    }
}
