<?php


namespace OpenWAClient\Handler;


use Psr\Http\Message\ResponseInterface;

/**
 * Class Response
 *
 * @package OpenWAClient\Handler
 */
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

    /**
     * @return string
     */
    function getResponse(): string
    {
        return $this->getClient()->getBody()->getContents();
    }

    /**
     * @return ResponseInterface
     */
    private function getClient(): ResponseInterface
    {
        return $this->client;
    }
}