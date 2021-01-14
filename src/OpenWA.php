<?php


namespace OpenWAClient;


use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class OpenWA
 *
 * @package OpenWAClient
 */
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

    /**
     * @return Initiation
     */
    protected function getInit(): Initiation
    {
        return $this->init;
    }

    /**
     * @param     String     $end_point     End point API (e.g getMe, getSessionInfo, setMyStatus, ...)
     * @param     array      $data          Form params
     *
     * @return ResponseInterface
     * @throws GuzzleException
     */
    protected function request(string $end_point, Array $data = []): ResponseInterface
    {
        return $this->getInit()->HttpRequest()->request($end_point, $data);
    }

}