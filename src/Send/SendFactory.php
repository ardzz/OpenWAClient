<?php


namespace OpenWAClient\Send;


use OpenWAClient\Factory;
use OpenWAClient\Initiation;

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

    private function getInit(): Initiation
    {
        return $this->initiation;
    }

    function Text(): Text
    {
        return new Text($this->getInit());
    }

    function Media(): Media
    {
        return new Media($this->getInit());
    }

    function Contact(): Contact
    {
        return new Contact($this->getInit());
    }

    function File(): File
    {
        return new File($this->getInit());
    }
}