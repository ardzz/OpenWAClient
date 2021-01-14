<?php


namespace OpenWAClient\Handler;


/**
 * Class Output
 *
 * @package OpenWAClient\Handler
 */
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

    /**
     * @return bool
     */
    protected function verifyResponse(): bool
    {
        return array_key_exists("response", $this->getRawOutput());
    }

    /**
     * @return string[]
     */
    function getOutput(): array
    {
        return $this->verifyResponse() ? $this->getRawOutput()["response"] : ["no responses"];
    }

    /**
     * @return bool
     */
    function isSuccess(): bool
    {
        return (bool) $this->getRawOutput()["success"];
    }

    /**
     * @return mixed
     */
    protected function getRawOutput()
    {
        return $this->output;
    }
}