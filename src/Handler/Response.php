<?php


namespace OpenWAClient\Handler;


use Psr\Http\Message\ResponseInterface;

class Response
{
    /**
     * @var ResponseInterface
     */
    private ResponseInterface $client;

    /**
     * Response constructor.
     *
     * @param     ResponseInterface     $client
     */
    public function __construct(ResponseInterface $client)
    {
        $this->client = $client;
    }

    function getResponse(): string
    {
        return $this->getClient()->getBody()->getContents();
    }

    private function getClient(): ResponseInterface
    {
        return $this->client;
    }
}