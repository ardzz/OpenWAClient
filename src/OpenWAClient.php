<?php


namespace OpenWAClient;


use OpenWAClient\Handler\Exception\OpenWAException;
use OpenWAClient\Send\SendFactory;

/**
 * Class Factory
 *
 * @package OpenWAClient
 */
class OpenWAClient
{
    /**
     * @var Initiation
     */
    private Initiation $initiation;

    /**
     * @param     String          $base_uri     Base Uri (e.g http://localhost:8080/)
     * @param     String|NULL     $api_key      API Key
     *
     * @throws OpenWAException
     */
    public function __construct(string $base_uri, String $api_key = NULL)
    {
        $this->initiation = new Initiation($base_uri, $api_key);

        $server = $this->Server();
        if (!$server->isAccessible()){
            throw new OpenWAException("The server is inaccessible, make sure you put a right host!");
        }
        elseif (!$server->callFromFactory()->isApiKeyValid()){
            throw new OpenWAException("Invalid API Key");
        }
        elseif (!$server->isPhoneConnected()){
            throw new OpenWAException("Phone is disconnected!, make sure your phone is connected from internet");
        }
    }

    /**
     * @return Initiation
     */
    private function getInit(): Initiation
    {
        return $this->initiation;
    }

    /**
     * @return Server
     */
    function Server(): Server
    {
        return new Server($this->getInit());
    }

    /**
     * @return User
     */
    function User(): User
    {
        return new User($this->getInit());
    }

    /**
     * @return SendFactory
     */
    function Send(): SendFactory
    {
        return new SendFactory($this->getInit());
    }
}