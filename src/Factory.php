<?php


namespace OpenWAClient;


use OpenWAClient\Send\SendFactory;

class Factory
{
    /**
     * @var Initiation
     */
    private Initiation $initiation;

    public function __construct(String $base_uri, String $api_key = NULL)
    {
        $this->initiation = new Initiation($base_uri, $api_key);

        $server = $this->Server();
        /*if (!$server->isAccessible()){
            throw new Exception("The server is inaccessible, make sure you put a right host!");
        }
        elseif (!$server->callFromFactory()->isApiKeyValid()){
            throw new Exception("Invalid API Key");
        }
        elseif (!$server->isPhoneConnected()){
            throw new Exception("Phone is disconnected!, make sure your phone is connected from internet");
        }*/
    }

    private function getInit(): Initiation
    {
        return $this->initiation;
    }

    function Server(): Server
    {
        return new Server($this->getInit());
    }

    function User(): User
    {
        return new User($this->getInit());
    }

    function Send(): SendFactory
    {
        return new SendFactory($this->getInit());
    }
}