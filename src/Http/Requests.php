<?php


namespace OpenWAClient\Http;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Requests
 *
 * @package OpenWAClient\Http
 */
class Requests
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * Requests constructor.
     *
     * @param     String          $base_uri     Base Uri (e.g http://localhost:8080/)
     * @param     String|NULL     $api_key      API Key
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

    /**
     * @return Client
     */
    function guzzle(): Client
    {
        return $this->client;
    }

    /**
     * @param     String     $end_point     End point API (e.g getMe, getSessionInfo, setMyStatus, ...)
     * @param     array      $data          Form params
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    function request(String $end_point, Array $data = []): ResponseInterface
    {
        return $client = $this->guzzle()->request("POST", $end_point, [
            "json" => $data
        ]);
    }
}