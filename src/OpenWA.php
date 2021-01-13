<?php


namespace OpenWAClient;


use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use Psr\Http\Message\ResponseInterface;

class OpenWA
{
    /**
     * @var Initiation
     */
    private Initiation $init;

    /**
     * User constructor.
     *
     * @param     Initiation     $initiation
     */
    public function __construct(Initiation $initiation)
    {
        $this->init = $initiation;
    }

    protected function getInit(): Initiation
    {
        return $this->init;
    }

    protected function request(String $end_point, Array $data = []): ResponseInterface
    {
        return $this->getInit()->HttpRequest()->request($end_point, $data);
    }

    protected function handleOutput(Response $response): Output
    {
        return new Output($response);
    }
}