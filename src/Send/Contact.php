<?php


namespace OpenWAClient\Send;


use GuzzleHttp\Exception\GuzzleException;
use OpenWAClient\Handler\Exception\VCardException;
use OpenWAClient\Handler\Number;
use OpenWAClient\Handler\Output;
use OpenWAClient\Handler\Response;
use OpenWAClient\Helper\VCard;
use OpenWAClient\OpenWA;

/**
 * Class Contact
 *
 * @package OpenWAClient\Send
 */
class Contact extends OpenWA
{
    /**
     * @param     String             $fullName            Full name
     * @param     String|Integer     $phoneNumber         Contact number [country code][number]
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws VCardException|GuzzleException
     */
    function VCard(String $fullName, $phoneNumber, $receiver_number): Output
    {
        $vcard = new VCard();
        $vcard->addName($fullName);
        $vcard->addPhoneNumber($phoneNumber);

        $request = $this->request("sendVCard", [
            "args" => [
                "chatId"=> Number::format($receiver_number),
                "vcard" => $vcard->getOutput(),
                "contactName" => $fullName,
                "contactNumber" => $phoneNumber
            ]
        ]);

        return new Output(new Response($request));
    }

    /**
     * @param     String|Integer     $contact_number      Contact number [country code][number]
     * @param     String|Integer     $receiver_number     Receiver number [country code][number]
     *
     * @return Output
     * @throws GuzzleException
     */
    function Contact($contact_number, $receiver_number): Output
    {
        $request = $this->request("sendContact", [
            "args" => [
                "to" => Number::format($receiver_number),
                "contactId" => Number::format($contact_number)
            ]
        ]);

        return new Output(new Response($request));
    }
}