<?php


namespace OpenWAClient;


use OpenWAClient\Http\Requests;

/**
 * Class Initiation
 *
 * @package OpenWAClient
 */
class Initiation
{
    /**
     * @var String
     */
    private string $base_uri;
    /**
     * @var String|null
     */
    private ?string $api_key;

    /**
     * Initiation constructor.
     *
     * @param     String          $base_uri     Base Uri (e.g http://localhost:8080/)
     * @param     String|NULL     $api_key      API Key
     */
    function __construct(String $base_uri, String $api_key = NULL)
    {
        $this->base_uri = $base_uri;
        $this->api_key  = $api_key;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->base_uri;
    }

    /**
     * @return bool|String
     */
    function getApiKey()
    {
        return $this->api_key ?? $this->isSetApiKey();
    }

    /**
     * @return bool
     */
    function isSetApiKey(): bool
    {
        return isset($this->api_key);
    }

    /**
     * @return Requests
     */
    function HttpRequest(): Requests
    {
        return new Requests($this->getBaseUri(), $this->getApiKey());
    }
}