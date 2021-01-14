<?php


namespace OpenWAClient\Send;


use OpenWAClient\Initiation;

/**
 * Class SendFactory
 *
 * @package OpenWAClient\Send
 */
class SendFactory
{
    /**
     * @var Initiation
     */
    private Initiation $initiation;

    /**
     * SendFactory constructor.
     *
     * @param     Initiation     $initiation
     */
    public function __construct(Initiation $initiation)
    {
        $this->initiation = $initiation;
    }

    /**
     * @return Initiation
     */
    private function getInit(): Initiation
    {
        return $this->initiation;
    }

    /**
     * @return Text
     */
    function Text(): Text
    {
        return new Text($this->getInit());
    }

    /**
     * @return Media
     */
    function Media(): Media
    {
        return new Media($this->getInit());
    }

    /**
     * @return Contact
     */
    function Contact(): Contact
    {
        return new Contact($this->getInit());
    }

    /**
     * @return File
     */
    function File(): File
    {
        return new File($this->getInit());
    }
}