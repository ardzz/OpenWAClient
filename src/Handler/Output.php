<?php


namespace OpenWAClient\Handler;



class Output
{
    /**
     * @var mixed
     */
    private $output;

    /**
     * Output constructor.
     *
     * @param     Response     $response
     */
    public function __construct(Response $response)
    {
        $this->output = json_decode($response->getResponse(), 1);
    }

    protected function verifyResponse(): bool
    {
        return array_key_exists("response", $this->getRawOutput());
    }

    function getOutput(): array
    {
        return $this->verifyResponse() ? $this->getRawOutput()["response"] : ["no responses"];
    }

    function isSuccess(): bool
    {
        return (bool) $this->getRawOutput()["success"];
    }

    function getRawOutput()
    {
        return $this->output;
    }
}