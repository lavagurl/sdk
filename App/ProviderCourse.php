<?php

namespace App;

class ProviderCourse extends AbstractProvider
{

    protected $data = [
        "name" => "Cours",
        "redirect_uri" => "http://localhost",
        "uri" => "http://localhost"
    ];

    protected $clientId;
    protected $clientSecret;
    protected $uri = "https://myapp";
    protected $accessLink = "https://myapp/auth";
    protected $uriAuth = "https://myapp/token";

    public function __construct(string $client_id = null, string $client_secret = null)
    {
        $response = $this->callback("/register", [
            "name" => "cours" . rand(0, 100),
            "uri" => $this->data["uri"],
            "redirect_success" => $this->data["redirect_uri"],
            "redirect_error" => $this->data["redirect_uri"],
        ]);

        //save client id and secret
        if (!is_null($client_id) && !is_null($client_secret)) {
            $this->clientId = $client_id;
            $this->clientSecret = $client_secret;
        } else {
            $this->clientId = $response["client_id"];
            $this->clientSecret = $response["client_secret"];
        }

    }

    public function getUserData()
    {
        return $this->callback("/me");
    }
}