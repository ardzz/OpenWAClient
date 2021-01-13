<?php


namespace OpenWAClient\Http;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Requests
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * Requests constructor.
     *
     * @param     String     $base_uri
     * @param     String     $api_key
     */
    public function __construct(String $base_uri, String $api_key)
    {
       if ($api_key){
           $this->client = new Client([
               "base_uri" => $base_uri,
               "headers" => [
                   "api_key" => $api_key
               ]
           ]);
       }else{
           $this->client = new Client([
               "base_uri" => $base_uri,
           ]);
       }
    }

    function guzzle(): Client
    {
        return $this->client;
    }

    function request(String $end_point, Array $data = []): ResponseInterface
    {
        return $client = $this->guzzle()->request("POST", $end_point, [
            "json" => $data
        ]);
    }
}