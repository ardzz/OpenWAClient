<?php


namespace OpenWAClient;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Server
 *
 * This class have a responsibility to handle the User tasks
 *
 * @package OpenWAClient
 */
class Server extends OpenWA
{
    /**
     * @var bool
     */
    private bool $fromFactory;

    /**
     *
     * Check if the server is accessible or not
     *
     * @return bool
     */
    function isAccessible(): bool
    {
        $client = $this->getInit();
        try {
            $response = $client->HttpRequest()->guzzle()->request("GET", "/", [
                "timeout" => 5,
                "allow_redirects" => false
            ]);
            return in_array($response->getStatusCode(), [302, 404]);
        } catch (GuzzleException $e) {
            return in_array($e->getCode(), [302, 404]);
        }
    }

    /**
     *
     * Check if the RESt API need an authentication (api key)
     *
     * @return bool
     */
    function isNeedAuthentication(): bool
    {
        $client = $this->getInit();
        if ($this->isAccessible()){
            try {
                $response = $client->HttpRequest()->guzzle()->request("POST", "/getMe", [
                    "json" => [],
                    "timeout" => 5,
                    "allow_redirects" => false
                ]);
                return $response->getStatusCode() == 401;
            } catch (GuzzleException $e) {
                return $e->getCode() == 401;
            }
        }else{
            return false;
        }
    }

    /**
     *
     * Tell the class that the method called from factory
     *
     * @return $this
     */
    function callFromFactory(): Server
    {
        $this->fromFactory = true;
        return $this;
    }

    /**
     *
     * Check if the method called from factory or not
     *
     * @return bool
     */
    private function isCalledFromFactory(): bool
    {
        return isset($this->fromFactory) ? $this->fromFactory : false;
    }

    /**
     *
     * Check if the api key is valid and can authenticate
     *
     * @return bool
     */
    function isApiKeyValid(): bool
    {
        $client = $this->getInit();
        if ($this->isNeedAuthentication() && $client->isSetApiKey() || $this->isCalledFromFactory()){
            try {
                $response = $client->HttpRequest()->guzzle()->request("POST", "/getMe", [
                    "headers" => [
                        "api_key" => $client->getApiKey()
                    ],
                    "json" => [],
                    "timeout" => 5,
                    "allow_redirects" => false
                ]);
                return $response->getStatusCode() == 200;
            } catch (GuzzleException $e) {
                return $e->getCode() == 200;
            }
        }
        else{
            return false;
        }
    }

    /**
     *
     * Check if the mobile phone (host) is connected on internet
     *
     * @return bool
     * @throws GuzzleException
     */
    function isPhoneConnected(): bool
    {
        $client = $this->getInit()->HttpRequest();
        $response = $client->request("forceUpdateConnectionState");
        $output = json_decode($response->getBody()->getContents(), 1);
        return array_key_exists("response", $output) ? $output["response"] == "CONNECTED" : false;
    }
}