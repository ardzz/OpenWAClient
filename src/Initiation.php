<?php


namespace OpenWAClient;


use OpenWAClient\Http\Requests;

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

    function __construct(String $base_uri, String $api_key = NULL)
    {
        $this->base_uri = $base_uri;
        $this->api_key  = $api_key;
    }

    public function getBaseUri(): string
    {
        return $this->base_uri;
    }

    function getApiKey()
    {
        return $this->api_key ?? $this->isSetApiKey();
    }

    function isSetApiKey(): bool
    {
        return isset($this->api_key);
    }

    function HttpRequest(): Requests
    {
        return new Requests($this->getBaseUri(), $this->getApiKey());
    }
}